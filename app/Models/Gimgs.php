<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gimgs extends Model
{
    //
    protected $table='gimgs';//指定表
    protected $primaryKey='id';//主键id
    // public $timestamps=false;//关闭时间戳
    protected $guarded=['file'];//黑名单为空
}
