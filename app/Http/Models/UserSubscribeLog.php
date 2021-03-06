<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * 用户订阅地址请求日志
 * Class UserSubscribeLog
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int                    $id
 * @property int|null               $sid            对应user_subscribe的id
 * @property string|null            $request_ip     请求IP
 * @property string|null            $request_time   请求时间
 * @property string|null            $request_header 请求头部信息
 * @property-read Collection|User[] $user
 * @property-read int|null          $user_count
 * @method static Builder|UserSubscribeLog newModelQuery()
 * @method static Builder|UserSubscribeLog newQuery()
 * @method static Builder|UserSubscribeLog query()
 * @method static Builder|UserSubscribeLog whereId($value)
 * @method static Builder|UserSubscribeLog whereRequestHeader($value)
 * @method static Builder|UserSubscribeLog whereRequestIp($value)
 * @method static Builder|UserSubscribeLog whereRequestTime($value)
 * @method static Builder|UserSubscribeLog whereSid($value)
 */
class UserSubscribeLog extends Model
{
	public $timestamps = FALSE;
	protected $table = 'user_subscribe_log';
	protected $primaryKey = 'id';

	function user()
	{
		return $this->hasManyThrough(User::class, UserSubscribe::class, 'id', 'id', 'sid', 'user_id');
	}
}