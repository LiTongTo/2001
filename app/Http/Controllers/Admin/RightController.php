<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Right;
use Illuminate\Validation\Rule;
use Validator;
class RightController extends Controller
{
    //权限添加
    public function right(){
       return view('admin.right.right');
    }
    //执行添加
    public function rigdo(){
        $data=request()->all();
        $validator=Validator::make($data,[
            'right_name'=>'required|unique:right',
            'right_desc'=>'required',
            'right_url'=>'required'
        ],[
            'right_name.required'=>'权限不能为空',
            'right_name.unique'=>'该权限已存在',
            'right_desc.required'=>'权限简介不能为空',
            'right_url.required'=>'url不能为空',
        ]
    );
    if ($validator->fails()) {
        return redirect('admin/right')
        ->withErrors($validator)
        ->withInput();
        }

        $data['add_time']=time();
       // dd($data);
         $RightModel=new Right();
         $reg=$RightModel->create($data);
        // dd($reg);
        if($reg){
            return redirect('/admin/rigindex');
        }else{
            return redirect('/admin/right');
        }
    }

    //展示
    public function rigindex(){
        $RightModel=new Right();
        $reg=$RightModel->where('is_del',1)->paginate(2);
        return view('admin.right.rigindex',compact('reg'));
    }

    //删除
    public function rigdel($id){
        //dd($id);
        $RightModel=new Right();
        $reg=$RightModel->where('right_id',$id)->update(['is_del'=>2]);
        if($reg){
            return redirect('/admin/rigindex');
        }else{
            return redirect('/admin/rigindex');
        }
    }

    //修改
    public function rigedit($id){
       //dd($id);
       $RightModel=new Right();
       $reg=$RightModel->where('right_id',$id)->first();
       return view('admin.right.edit',compact('reg'));
    }

    //执行修改
    public function rigup($id){
         //dd($id);
         $data=request()->all();
         $validator=Validator::make($data,[
            'right_name'=>[
                'required',
                Rule::unique('right')->ignore($id,'right_id')
            ],
            'right_desc'=>'required',
            'right_url'=>'required'
        ],[
            'right_name.required'=>'权限不能为空',
            'right_name.unique'=>'该权限已存在',
            'right_desc.required'=>'权限简介不能为空',
            'right_url.required'=>'url不能为空',
        ]
    );
    if ($validator->fails()) {
        return redirect('admin/right')
        ->withErrors($validator)
        ->withInput();
        }

         $data['add_time']=time();
        // dd($data);
          $RightModel=new Right();
          $reg=$RightModel->where('right_id',$id)->update($data);
         // dd($reg);
         if($reg){
             return redirect('/admin/rigindex');
         }else{
             return redirect('/admin/rigindex');
         }
    }
}
