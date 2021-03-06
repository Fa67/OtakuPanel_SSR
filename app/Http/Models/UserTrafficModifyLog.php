<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 用户流量变动记录
 * Class UserTrafficModifyLog
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int        $id
 * @property int        $user_id  用户ID
 * @property int        $order_id 发生的订单ID
 * @property int        $before   操作前流量
 * @property int        $after    操作后流量
 * @property string     $desc     描述
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 * @property-read Order $order
 * @property-read User  $user
 * @method static Builder|UserTrafficModifyLog newModelQuery()
 * @method static Builder|UserTrafficModifyLog newQuery()
 * @method static Builder|UserTrafficModifyLog query()
 * @method static Builder|UserTrafficModifyLog whereAfter($value)
 * @method static Builder|UserTrafficModifyLog whereBefore($value)
 * @method static Builder|UserTrafficModifyLog whereCreatedAt($value)
 * @method static Builder|UserTrafficModifyLog whereDesc($value)
 * @method static Builder|UserTrafficModifyLog whereId($value)
 * @method static Builder|UserTrafficModifyLog whereOrderId($value)
 * @method static Builder|UserTrafficModifyLog whereUpdatedAt($value)
 * @method static Builder|UserTrafficModifyLog whereUserId($value)
 */
class UserTrafficModifyLog extends Model
{
	protected $table = 'user_traffic_modify_log';
	protected $primaryKey = 'id';

	// 关联账号
	function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	// 关联订单
	function order()
	{
		return $this->hasOne(Order::class, 'oid', 'order_id');
	}

	function getBeforeAttribute($value)
	{
		return $this->attributes['before'] = flowAutoShow($value);
	}

	function getAfterAttribute($value)
	{
		return $this->attributes['after'] = flowAutoShow($value);
	}

}