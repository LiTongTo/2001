<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //指定表
    protected $table='role';
    //主键id
    protected $primaryKey='role_id';
    //关闭时间戳  使用create 
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
    //白名单
    //protected $fillable=[];
}
