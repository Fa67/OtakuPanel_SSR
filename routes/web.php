<?php

Route::get('s/{code}', 'User\SubscribeController@getSubscribeByCode'); // 节点订阅地址

Route::group(['middleware' => ['isForbidden', 'affiliate', 'isMaintenance']], function(){
	Route::get('lang/{locale}', 'AuthController@switchLang'); // 语言切换
	Route::any('login', 'AuthController@login')->middleware('isSecurity'); // 登录
	Route::get('logout', 'AuthController@logout'); // 退出
	Route::any('register', 'AuthController@register'); // 注册
	Route::any('resetPassword', 'AuthController@resetPassword'); // 重设密码
	Route::any('reset/{token}', 'AuthController@reset'); // 重设密码
	Route::any('activeUser', 'AuthController@activeUser'); // 激活账号
	Route::get('active/{token}', 'AuthController@active'); // 激活账号
	Route::post('sendCode', 'AuthController@sendCode'); // 发送注册验证码
	Route::get('free', 'AuthController@free'); // 免费邀请码
	Route::get('makePasswd', 'Controller@makePasswd'); // 生成密码
	Route::get('makeVmessId', 'Controller@makeVmessId'); // 生成VmessId
	Route::get('makeSecurityCode', 'Controller@makeSecurityCode'); // 生成网站安全码
});
Route::any('admin/login', 'AuthController@login')->middleware('isForbidden', 'isSecurity'); // 登录

Route::group(['middleware' => ['isForbidden', 'isAdminLogin', 'isAdmin']], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('', 'AdminController@index'); // 后台首页
		Route::get('userList', 'AdminController@userList'); // 账号列表
		Route::any('addUser', 'AdminController@addUser'); // 添加账号
		Route::any('editUser/{id}', 'AdminController@editUser'); // 编辑账号
		Route::post('delUser', 'AdminController@delUser'); // 删除账号
		Route::post('batchAddUsers', 'AdminController@batchAddUsers'); // 批量生成账号
		Route::get('exportSSJson', 'AdminController@exportSSJson'); // 导出原版SS的json配置信息
		Route::any('nodeList', 'AdminController@nodeList'); // 节点列表
		Route::any('addNode', 'AdminController@addNode'); // 添加节点
		Route::any('editNode', 'AdminController@editNode'); // 编辑节点
		Route::post('delNode', 'AdminController@delNode'); // 删除节点
		Route::get('nodeMonitor/{id}', 'AdminController@nodeMonitor'); // 节点流量监控
		Route::post('pingNode', 'AdminController@pingNode'); // 节点ping测速
		Route::get('nodePingLog', 'AdminController@nodePingLog'); //节点Ping测速日志
		Route::get('articleList', 'AdminController@articleList'); // 文章列表
		Route::any('addArticle', 'AdminController@addArticle'); // 添加文章
		Route::any('editArticle', 'AdminController@editArticle'); // 编辑文章
		Route::post('delArticle', 'AdminController@delArticle'); // 删除文章
		Route::get('groupList', 'AdminController@groupList'); // 分组列表
		Route::any('addGroup', 'AdminController@addGroup'); // 添加分组
		Route::any('editGroup/{id}', 'AdminController@editGroup'); // 编辑分组
		Route::post('delGroup/{id}', 'AdminController@delGroup'); // 删除分组
		Route::get('labelList', 'AdminController@labelList'); // 标签列表
		Route::any('addLabel', 'AdminController@addLabel'); // 添加标签
		Route::any('editLabel', 'AdminController@editLabel'); // 编辑标签
		Route::post('delLabel', 'AdminController@delLabel'); // 删除标签
		Route::get('orderList', 'AdminController@orderList'); // 订单列表
		Route::get('inviteList', 'AdminController@inviteList'); // 邀请码列表
		Route::post('makeInvite', 'AdminController@makeInvite'); // 生成邀请码
		Route::get('exportInvite', 'AdminController@exportInvite'); // 导出邀请码
		Route::any('config', 'AdminController@config'); // 配置列表
		Route::any('addConfig', 'AdminController@addConfig'); // 添加配置
		Route::post('delConfig', 'AdminController@delConfig'); // 删除配置
		Route::post('addLevel', 'AdminController@addLevel'); // 增加等级
		Route::post('updateLevel', 'AdminController@updateLevel'); // 更新等级
		Route::post('delLevel', 'AdminController@delLevel'); // 删除等级
		Route::post('addCountry', 'AdminController@addCountry'); // 增加国家/地区
		Route::post('updateCountry', 'AdminController@updateCountry'); // 更新国家/地区
		Route::post('delCountry', 'AdminController@delCountry'); // 删除国家/地区
		Route::post('setDefaultConfig', 'AdminController@setDefaultConfig'); // 设置默认配置
		Route::get('system', 'AdminController@system'); // 系统设置
		Route::post('setExtend', 'AdminController@setExtend'); // 设置客服、统计代码
		Route::post('setConfig', 'AdminController@setConfig'); // 设置某个配置项
		Route::get('userBalanceLogList', 'AdminController@userBalanceLogList'); // 余额变动记录
		Route::get('userTrafficLogList', 'AdminController@userTrafficLogList'); // 流量变动记录
		Route::get('userBanLogList', 'AdminController@userBanLogList'); // 用户封禁记录
		Route::get('userOnlineIPList', 'AdminController@userOnlineIPList'); // 用户在线IP记录
		Route::any('export/{id}', 'AdminController@export'); // 导出(查看)配置信息
		Route::get('userMonitor/{id}', 'AdminController@userMonitor'); // 用户流量监控
		Route::post('resetUserTraffic', 'AdminController@resetUserTraffic'); // 重置用户流量
		Route::post('handleUserBalance', 'AdminController@handleUserBalance'); // 用户余额充值
		Route::post("switchToUser", "AdminController@switchToUser"); // 转换成某个用户的身份
		Route::get("onlineIPMonitor", "AdminController@onlineIPMonitor"); // 在线IP监控
		Route::any("decompile", "AdminController@decompile"); // SS(R)链接反解析
		Route::get('download', 'AdminController@download'); // 下载转换过的JSON配置
		Route::any('convert', 'AdminController@convert'); // 格式转换
		Route::any('import', 'AdminController@import'); // 数据导入
		Route::get('trafficLog', 'AdminController@trafficLog'); // 流量日志
		Route::get('analysis', 'AdminController@analysis'); // 日志分析
		Route::get('notificationLog', 'AdminController@notificationLog'); // 邮件发送日志
		Route::post('sendTestNotification', 'AdminController@sendTestNotification'); //推送通知测试
		Route::any('profile', 'AdminController@profile'); // 修改个人信息
		Route::get('makePort', 'AdminController@makePort'); // 生成端口

		//返利相关
		Route::group(['namespace' => 'Admin'], function(){
			Route::get('affList', 'AffiliateController@affiliateList'); // 提现申请列表
			Route::get('affDetail', 'AffiliateController@affiliateDetail'); // 提现申请详情
			Route::post('setAffStatus', 'AffiliateController@setAffiliateStatus'); // 设置提现申请状态
			Route::get('userRebateList', 'AffiliateController@userRebateList'); // 返利流水记录
		});
	});

	Route::group(['namespace' => 'Admin'], function(){
		Route::group(['prefix' => 'ticket'], function(){
			Route::get('ticketList', 'TicketController@ticketList'); // 工单列表
			Route::any('replyTicket', 'TicketController@replyTicket'); // 回复工单
			Route::post('closeTicket', 'TicketController@closeTicket'); // 关闭工单
		});

		Route::group(['prefix' => 'coupon'], function(){
			Route::any('couponList', 'CouponController@couponList'); // 优惠券列表
			Route::any('addCoupon', 'CouponController@addCoupon'); // 添加优惠券
			Route::post('delCoupon', 'CouponController@delCoupon'); // 删除优惠券
			Route::get('exportCoupon', 'CouponController@exportCoupon'); // 导出优惠券
		});

		Route::group(['prefix' => 'shop'], function(){
			Route::any('goodsList', 'ShopController@goodsList'); // 商品列表
			Route::any('addGoods', 'ShopController@addGoods'); // 添加商品
			Route::any('editGoods/{id}', 'ShopController@editGoods'); // 编辑商品
			Route::post('delGoods', 'ShopController@delGoods'); // 删除商品
		});

		Route::group(['prefix' => 'subscribe'], function(){
			Route::get('subscribeList', 'SubscribeController@subscribeList'); // 订阅码列表
			Route::get('subscribeLog', 'SubscribeController@subscribeLog'); // 订阅码记录
			Route::get('deviceList', 'SubscribeController@deviceList'); // 订阅设备列表
			Route::post('setSubscribeStatus', 'SubscribeController@setSubscribeStatus'); // 启用禁用用户的订阅
			Route::post('setDeviceStatus', 'SubscribeController@setDeviceStatus'); // 是否允许设备订阅
		});

		Route::group(['prefix' => 'marketing'], function(){
			Route::get("emailList", "MarketingController@emailList"); // 邮件消息列表
			Route::get("pushList", "MarketingController@pushList"); // 推送消息列表
			Route::post("addPushMarketing", "MarketingController@addPushMarketing"); // 推送消息
		});

		Route::group(['prefix' => 'sensitiveWords'], function(){
			Route::get("list", "SensitiveWordsController@sensitiveWordslist"); // 敏感词列表
			Route::post("add", "SensitiveWordsController@addSensitiveWords"); // 添加敏感词
			Route::post("del", "SensitiveWordsController@delSensitiveWords"); // 删除敏感词
		});
	});

	Route::get("payment/callbackList", "PaymentController@callbackList"); // 支付回调日志
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'); // 系统运行日志
});

Route::group(['middleware' => ['isForbidden', 'isMaintenance', 'isLogin']], function(){
	Route::any('/', 'UserController@index'); // 用户首页
	Route::any('article', 'UserController@article'); // 文章详情
	Route::post('exchangeSubscribe', 'UserController@exchangeSubscribe'); // 更换节点订阅地址
	Route::any('nodeList', 'UserController@nodeList'); // 节点列表
	Route::post('checkIn', 'UserController@checkIn'); // 签到
	Route::get('services', 'UserController@services'); // 商品列表
	Route::get('tickets', 'UserController@ticketList'); // 工单
	Route::post('addTicket', 'UserController@addTicket'); // 快速添加工单
	Route::any('replyTicket', 'UserController@replyTicket'); // 回复工单
	Route::post('closeTicket', 'UserController@closeTicket'); // 关闭工单
	Route::get('invoices', 'UserController@invoices'); // 订单列表
	Route::post('activeOrder', 'UserController@activeOrder'); // 激活预支付套餐
	Route::get('invoice/{sn}', 'UserController@invoiceDetail'); // 订单明细
	Route::post('resetUserTraffic', 'UserController@resetUserTraffic'); // 重置用户流量
	Route::any('buy/{id}', 'UserController@buy'); // 购买商品
	Route::post('redeemCoupon', 'UserController@redeemCoupon'); // 使用优惠券
	Route::get('invite', 'UserController@invite'); // 邀请码
	Route::post('makeInvite', 'UserController@makeInvite'); // 生成邀请码
	Route::any('profile', 'UserController@profile'); // 修改个人信息
	Route::post("switchToAdmin", "UserController@switchToAdmin"); // 转换成管理员的身份
	Route::post("charge", "UserController@charge"); // 卡券余额充值
	Route::get("help", "UserController@help"); // 帮助中心

	Route::group(['namespace' => 'User'], function(){
		Route::get('referral', 'AffiliateController@referral'); // 推广返利
		Route::post('extractMoney', 'AffiliateController@extractMoney'); // 申请提现
	});

	Route::group(['prefix' => 'payment'], function(){
		Route::post('purchase', 'PaymentController@purchase'); // 创建支付
		Route::get('getStatus', 'PaymentController@getStatus'); // 获取支付单状态
		Route::get('{sn}', 'PaymentController@detail'); // 支付单详情
	});
});

Route::group(['prefix' => 'callback'], function(){
	Route::get('checkout', 'Gateway\PayPal@getCheckout');
	Route::post('notify', 'PaymentController@notify'); //支付回调
});
