<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Validator;
class RoleController extends Controller
{
    //角色添加
    public function role(){
        return view('admin.role.role');
    }

    //执行
    public function roledo(){
        $data=request()->all();
       $validator= Validator::make($data,[
           'role_name'=>'required|unique:role',
           'role_desc'=>'required',
       ],[
           'role_name.required'=>'角色名称不能为空',
           'role_name.unique'=>'角色已存在',
           'role_desc.required'=>'简介不能为空'
       ]
       );
       if ($validator->fails()) {
        return redirect('admin/role')
        ->withErrors($validator)
        ->withInput();
        }

        $data['add_time']=time();
        $RoleModel=new Role();
        $reg=$RoleModel->create($data);
        if($reg){
            return redirect('/admin/roindex');
        }else{
            return redirect('/admin/role');
        }
    }
    //展示
    public function roindex(){
        $RoleModel=new Role();
        $data=$RoleModel->where('is_del',1)->paginate(2);
        return view('admin.role.roindex',compact('data'));
    }

    //删除
    public function rodel($id){
        // dd($id);
        $RoleModel=new Role();
        $reg=$RoleModel->where('role_id',$id)->update(['is_del'=>2]);
        // dd($reg);
        if($reg){
            return redirect('/admin/roindex');
        }else{
            return redirect('/admin/roindex');
        }
    }

    //修改
    public function roedit($id){
       //dd($id);
       $RoleModel=new Role();
       $data=$RoleModel->where('role_id',$id)->first();
       return view('admin.role.edit',compact('data'));
    }

    //执行修改
    public function roup($id){
       //dd($id);
       $data=request()->all();
       $validator=Validator::make($data,[
           'role_name'=>[
               'required',
               Rule::unique('role')->ignore($id,'role_id')
           ],
           'role_desc'=>'required'

        ],[
             'role_name.required'=>'角色名称不能为空',
             'role_desc'=>'简介不能为空'
        ]);
        if ($validator->fails()) {
            return redirect('admin/roedit')
            ->withErrors($validator)
            ->withInput();
            }

       $data['add_time']=time();
       $RoleModel=new Role();
       $reg=$RoleModel->where('role_id',$id)->update($data);
       if($reg){
           return redirect('/admin/roindex');
       }else{
           return redirect('/admin/role');
       }
    }
}
