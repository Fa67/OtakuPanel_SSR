<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 优惠券使用日志
 * Class Goods
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int         $id
 * @property int         $coupon_id  优惠券ID
 * @property int         $goods_id   商品ID
 * @property int         $order_id   订单ID
 * @property string      $desc       备注
 * @property Carbon|null $created_at 创建时间
 * @property Carbon|null $updated_at 最后更新时间
 * @method static Builder|CouponLog newModelQuery()
 * @method static Builder|CouponLog newQuery()
 * @method static Builder|CouponLog query()
 * @method static Builder|CouponLog whereCouponId($value)
 * @method static Builder|CouponLog whereCreatedAt($value)
 * @method static Builder|CouponLog whereDesc($value)
 * @method static Builder|CouponLog whereGoodsId($value)
 * @method static Builder|CouponLog whereId($value)
 * @method static Builder|CouponLog whereOrderId($value)
 * @method static Builder|CouponLog whereUpdatedAt($value)
 */
class CouponLog extends Model
{
	protected $table = 'coupon_log';
	protected $primaryKey = 'id';

}