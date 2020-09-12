<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
class CateController extends Controller
{
    public function cate(){
        $res = Cate::get();
        $res=self::list_level($res);
        return view("admin.cate.cate",['res'=>$res]);
    }
    public function cate_add(){
        $data = request()->all();
        $data = [
            "cate_name"=>$data['cate_name'],
            "parent_id"=>$data['parent_id'],
            "cate_show"=>1,
            "cate_nav_show"=>1
        ];
        $res = Cate::insert($data);
        if($res){
            return $message = [
                "code"=>00001,
                "message"=>"添加成功",
                "success"=>true,
            ];
        }
        // dd($res);
    }
    public function cate_index(){
        $cate_name = request()->cate_name;
        $where = [];
        if($cate_name){
            $where [] = ["cate_name","like","%$cate_name%"];
        }
        $res = Cate::where("cate_show",1)->where($where)->get();
        $res=self::list_level($res);
        $cate = request()->all();
        return view("admin.cate.cate_index",['res'=>$res,"cate"=>$cate]);
    }
     //提供一个无限极分类的方法
     public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
     {
         static $array=[];
         foreach($data as $k=>$v){
             if($pid==$v->parent_id){
                 $v->level=$level;
                 $array[]=$v;
                 self::list_level($data,$v->cate_id,$level+1);
             }
         }
         return $array;
     }
     public function cate_del(){
         $da = request()->all();
         $data = Cate::where("parent_id",$da['cate_id'])->first();
         if($data){
            return $message = [
                "code"=>000000,
                "message"=>"此分类下还有其它分类不可删除",
                "success"=>true,
            ];die;
         }
         $res = Cate::where("cate_id",$da['cate_id'])->update(['cate_show'=>2]);
        //  dd($res);
         if($res){
            return $message = [
                "code"=>000000,
                "message"=>"已删除",
                "success"=>true,
            ];die;
         }
     }
     public function jdjg(){
         $data = request()->all();
         $res = Cate::where("cate_id",$data['cate_id'])->update([$data['cate_name']=>$data['value']]);
         if($res){
            return $message = [
                "code"=>000000,
                "message"=>"修改成功",
                "success"=>true,
            ];die;
         }
     }
}
