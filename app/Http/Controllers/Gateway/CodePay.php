<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Models\Payment;
use Auth;
use Response;

class CodePay extends AbstractPayment
{
	public function purchase($request)
	{
		$payment = new Payment();
		$payment->sn = self::generateGuid();
		$payment->user_id = Auth::user()->id;
		$payment->oid = $request->input('oid');
		$payment->amount = $request->input('amount');
		$payment->save();

		$data = [
			'id'         => parent::$systemConfig['codepay_id'],
			'pay_id'     => $payment->sn,
			'type'       => $request->input('type'),//1支付宝支付 2QQ钱包 3微信支付
			'price'      => $payment->amount,
			'page'       => 1,
			'outTime'    => 900,
			'param'      => '',
			'notify_url' => (parent::$systemConfig['website_callback_url']? : parent::$systemConfig['website_url']).'/callback/notify?method=codepay',
			'return_url' => parent::$systemConfig['website_url'].'/invoices',
		];

		ksort($data);
		reset($data);

		$sign = '';
		$urls = '';

		foreach($data as $key => $val){
			if($val == '' || $key == 'sign'){
				continue;
			}
			if($sign != ''){
				$sign .= '&';
				$urls .= '&';
			}
			$sign .= "$key=$val"; //拼接为url参数形式
			$urls .= "$key=".urlencode($val); //拼接为url参数形式并URL编码参数值
		}
		$query = $urls.'&sign='.md5($sign.parent::$systemConfig['codepay_key']); //创建订单所需的参数
		$url = parent::$systemConfig['codepay_url'].$query; //支付页面
		Payment::whereId($payment->id)->update(['url' => $url]);

		return Response::json(['status' => 'success', 'url' => $url, 'message' => '创建订单成功!']);
	}

	public function notify($request)
	{
		ksort($_POST);
		reset($_POST);
		$sign = '';
		foreach($_POST as $key => $val){
			if($val == '' || $key == 'sign'){
				continue;
			}
			if($sign){
				$sign .= '&';
			}
			$sign .= "$key=$val";
		}
		if(!$_POST['pay_no'] || md5($sign.parent::$systemConfig['codepay_key']) != $_POST['sign']){
			exit('fail');
		}
		$payment = Payment::whereSn($_POST['pay_id'])->first();

		if($payment){
			if($payment->status == 0){
				$this->postPayment($_POST['pay_id'], '码支付');
			}
			exit('success');
		}
		exit('fail');
	}

	public function getReturnHTML($request)
	{
		// TODO: Implement getReturnHTML() method.
	}

	public function getPurchaseHTML()
	{
		// TODO: Implement getReturnHTML() method.
	}
}