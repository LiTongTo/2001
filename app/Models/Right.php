<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    //指定表
    protected $table='right';
    //主键id
    protected $primaryKey='right_id';
    //关闭时间戳
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
