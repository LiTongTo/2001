<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table='cate';//指定表
    protected $primaryKey='cate_id';//主键id
    public $timestamps=false;//关闭时间戳
    protected $guarded=['file'];//黑名单为空
    // fillable 白名单
}
