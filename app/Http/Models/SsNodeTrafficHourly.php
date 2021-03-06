<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 节点每日流量统计
 * Class SsUserTrafficHourly
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int         $id
 * @property int         $node_id    节点ID
 * @property int         $u          上传流量
 * @property int         $d          下载流量
 * @property int         $total      总流量
 * @property string|null $traffic    总流量（带单位）
 * @property Carbon|null $created_at 创建时间
 * @property Carbon|null $updated_at 最后更新时间
 * @property-read SsNode $info
 * @method static Builder|SsNodeTrafficHourly newModelQuery()
 * @method static Builder|SsNodeTrafficHourly newQuery()
 * @method static Builder|SsNodeTrafficHourly query()
 * @method static Builder|SsNodeTrafficHourly whereCreatedAt($value)
 * @method static Builder|SsNodeTrafficHourly whereD($value)
 * @method static Builder|SsNodeTrafficHourly whereId($value)
 * @method static Builder|SsNodeTrafficHourly whereNodeId($value)
 * @method static Builder|SsNodeTrafficHourly whereTotal($value)
 * @method static Builder|SsNodeTrafficHourly whereTraffic($value)
 * @method static Builder|SsNodeTrafficHourly whereU($value)
 * @method static Builder|SsNodeTrafficHourly whereUpdatedAt($value)
 */
class SsNodeTrafficHourly extends Model
{
	protected $table = 'ss_node_traffic_hourly';
	protected $primaryKey = 'id';

	function info()
	{
		return $this->hasOne(SsNode::class, 'id', 'node_id');
	}
}