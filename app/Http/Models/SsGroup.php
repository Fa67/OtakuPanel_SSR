<?php

namespace App\Http\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * SS节点分组
 * Class SsNodeGroup
 *
 * @package App\Http\Models
 * @mixin Eloquent
 * @property int         $id
 * @property string      $name  分组名称
 * @property int         $level 分组级别
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|SsGroup newModelQuery()
 * @method static Builder|SsGroup newQuery()
 * @method static Builder|SsGroup query()
 * @method static Builder|SsGroup whereCreatedAt($value)
 * @method static Builder|SsGroup whereId($value)
 * @method static Builder|SsGroup whereLevel($value)
 * @method static Builder|SsGroup whereName($value)
 * @method static Builder|SsGroup whereUpdatedAt($value)
 */
class SsGroup extends Model
{
	protected $table = 'ss_group';
	protected $primaryKey = 'id';

}