<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * SS节点信息
 * Class SsNode
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int                           $id
 * @property int                           $type             服务类型：1-SS、2-V2ray
 * @property string                        $name             名称
 * @property int                           $group_id         所属分组
 * @property string                        $country_code     国家代码
 * @property string|null                   $server           服务器域名地址
 * @property string|null                   $ip               服务器IPV4地址
 * @property string|null                   $ipv6             服务器IPV6地址
 * @property string|null                   $desc             节点简单描述
 * @property string                        $method           加密方式
 * @property string                        $protocol         协议
 * @property string|null                   $protocol_param   协议参数
 * @property string                        $obfs             混淆
 * @property string|null                   $obfs_param       混淆参数
 * @property float                         $traffic_rate     流量比率
 * @property int                           $bandwidth        出口带宽，单位M
 * @property int                           $traffic          每月可用流量，单位G
 * @property string|null                   $monitor_url      监控地址
 * @property int|null                      $is_subscribe     是否允许用户订阅该节点：0-否、1-是
 * @property int                           $is_ddns          是否使用DDNS：0-否、1-是
 * @property int                           $is_transit       是否中转节点：0-否、1-是
 * @property int                           $ssh_port         SSH端口
 * @property int                           $detectionType    节点检测: 0-关闭、1-只检测TCP、2-只检测ICMP、3-检测全部
 * @property int                           $compatible       兼容SS
 * @property int                           $single           启用单端口功能：0-否、1-是
 * @property string|null                   $port             单端口的端口号
 * @property string|null                   $passwd           单端口的连接密码
 * @property int                           $sort             排序值，值越大越靠前显示
 * @property int                           $status           状态：0-维护、1-正常
 * @property int                           $v2_alter_id      V2ray额外ID
 * @property int                           $v2_port          V2ray端口
 * @property string                        $v2_method        V2ray加密方式
 * @property string                        $v2_net           V2ray传输协议
 * @property string                        $v2_type          V2ray伪装类型
 * @property string                        $v2_host          V2ray伪装的域名
 * @property string                        $v2_path          V2ray WS/H2路径
 * @property int                           $v2_tls           V2ray底层传输安全 0 未开启 1 开启
 * @property int                           $v2_insider_port  V2ray内部端口（内部监听），v2_port为0时有效
 * @property int                           $v2_outsider_port V2ray外部端口（外部覆盖），v2_port为0时有效
 * @property Carbon                        $created_at
 * @property Carbon                        $updated_at
 * @property-read Collection|SsNodeLabel[] $label
 * @property-read int|null                 $label_count
 * @method static Builder|SsNode newModelQuery()
 * @method static Builder|SsNode newQuery()
 * @method static Builder|SsNode query()
 * @method static Builder|SsNode whereBandwidth($value)
 * @method static Builder|SsNode whereCompatible($value)
 * @method static Builder|SsNode whereCountryCode($value)
 * @method static Builder|SsNode whereCreatedAt($value)
 * @method static Builder|SsNode whereDesc($value)
 * @method static Builder|SsNode whereDetectionType($value)
 * @method static Builder|SsNode whereGroupId($value)
 * @method static Builder|SsNode whereId($value)
 * @method static Builder|SsNode whereIp($value)
 * @method static Builder|SsNode whereIpv6($value)
 * @method static Builder|SsNode whereIsDdns($value)
 * @method static Builder|SsNode whereIsSubscribe($value)
 * @method static Builder|SsNode whereIsTransit($value)
 * @method static Builder|SsNode whereMethod($value)
 * @method static Builder|SsNode whereMonitorUrl($value)
 * @method static Builder|SsNode whereName($value)
 * @method static Builder|SsNode whereObfs($value)
 * @method static Builder|SsNode whereObfsParam($value)
 * @method static Builder|SsNode wherePasswd($value)
 * @method static Builder|SsNode wherePort($value)
 * @method static Builder|SsNode whereProtocol($value)
 * @method static Builder|SsNode whereProtocolParam($value)
 * @method static Builder|SsNode whereServer($value)
 * @method static Builder|SsNode whereSingle($value)
 * @method static Builder|SsNode whereSort($value)
 * @method static Builder|SsNode whereSshPort($value)
 * @method static Builder|SsNode whereStatus($value)
 * @method static Builder|SsNode whereTraffic($value)
 * @method static Builder|SsNode whereTrafficRate($value)
 * @method static Builder|SsNode whereType($value)
 * @method static Builder|SsNode whereUpdatedAt($value)
 * @method static Builder|SsNode whereV2AlterId($value)
 * @method static Builder|SsNode whereV2Host($value)
 * @method static Builder|SsNode whereV2InsiderPort($value)
 * @method static Builder|SsNode whereV2Method($value)
 * @method static Builder|SsNode whereV2Net($value)
 * @method static Builder|SsNode whereV2OutsiderPort($value)
 * @method static Builder|SsNode whereV2Path($value)
 * @method static Builder|SsNode whereV2Port($value)
 * @method static Builder|SsNode whereV2Tls($value)
 * @method static Builder|SsNode whereV2Type($value)
 */
class SsNode extends Model
{
	protected $table = 'ss_node';
	protected $primaryKey = 'id';

	function label()
	{
		return $this->hasMany(SsNodeLabel::class, 'node_id', 'id');
	}
}