<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandPost;
use App\Models\Brand;
use Validator;
class BrandController extends Controller
{
    #品牌视图
     public function brand(){
         return view('admin.brand.brand');
     }
     #文件上传
     public function upload(Request $request){

         if ($request->hasFile('file') && $request->file('file')->isValid()) {
             $photo = request()->file;
             $store_result = $photo->store('uploads');
             $data = env('UPLOADS_URL') . $store_result;
             // dd($data);
             return json_encode(['code' => 0, 'msg' => '上传成功', 'result' => $data]);
         }
            return json_encode(['code'=>1,'msg'=>'上传失败']);
         }
     #执行品牌添加
     public function bstore(Request $request)
     #表单验证2
     //public function bstore(StoreBrandPost $request)
     {
        $data=request()->all();
        //dd($data);
        #表单验证1
        // $request->validate([
        //     'brand_name' => 'required|unique:brand',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称为空',
        //     'brand_name.unique'=>'品牌名称已存在',
        //     'brand_url.required'=>'品牌路径不能为空',
        // ]
        // );

        #表单验证3
        $validator = Validator::make($data,
            [
            'brand_name' => 'required|unique:brand',
            'brand_url' => 'required',
            ],[
                    'brand_name.required'=>'品牌名称为空',
                    'brand_name.unique'=>'品牌名称已存在',
                    'brand_url.required'=>'品牌路径不能为空',
                ]

        );
            if ($validator->fails()) {
                return redirect('admin/brand')
                ->withErrors($validator)
                ->withInput();
                }

        $BrandModel=new Brand();
        $res=$BrandModel->create($data);
        if($res){
            return redirect('/admin/bindex');
        }
    }
    #品牌展示
    public function bindex(Request $request){
        $brand_name = $request->brand_name;
        $where = [];
        if($brand_name){
            $where[] = ['brand_name','like',"%$brand_name%"];
        }
        $brand_url = $request->brand_url;
        if($brand_url){
            $where[]= ['brand_url','like',"%$brand_url%"];
        }

        $BrandModel=new Brand();
        $data=$BrandModel->where('is_del',1)->where($where)->orderBy('brand_id','desc')->paginate(5);
        if(request()->ajax()){
           return view('admin.brand.ajaxpage',['data'=>$data,'query'=>request()->all()]);
        }
        return view('admin.brand.bindex',['data'=>$data,'query'=>request()->all()]);
    }

    #品牌修改视图
    public function bedit($id){
        $BrandModel=new Brand();
        $data=$BrandModel->where('brand_id',$id)->first();
        return view('admin.brand.edit',['data'=>$data]);
    }

    #品牌执行修改
   public function bupdate(StoreBrandPost $request){
         $brand_id=request()->brand_id;

         $data=request()->except('file');
         $BrandModel=new Brand();
         $res=$BrandModel->where('brand_id',$brand_id)->update($data);
         if($res==0){
             return redirect('/admin/bindex');
         } else if($res==1){
            return redirect('/admin/bindex');
         }else{
            return redirect('/admin/bindex');
         }

    }

    #即点即改
    public function jd(Request $request){
        $brand_id=$request->brand_id;
        $brand_name=$request->brand_name;
        $_val=$request->_val;
        $BrandModel=new Brand();
        $reg=$BrandModel->where('brand_id',$brand_id)->update([$brand_name=>$_val]);

        if($reg=='0'){
            $message = [
                'code'=> '000',
                'msg'=>'未做修改',

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }else if($reg=='1'){
            $message = [
                'code'=> '001',
                'msg'=>'修改成功',

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
            // return $this->success('修改成功');
        }else{
            $message = [
                'code'=> '002',
                'msg'=>'修改失败',

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }

    }

    #删除
    public function bdel(){
        $brand_id=request()->brand_id;
       
            $BrandModel=new Brand();
            $reg=$BrandModel->where('brand_id',$brand_id)->update(['is_del'=>2]);
    
        if($reg){
            $message = [
                'code'=> '000000',
                'msg'=>'删除成功',
                'url'=>'/admin/bindex'

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }else{
            $message = [
                'code'=> '000001',
                'msg'=>'删除失败',

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
    }

    #批量删除
    public function bdels(){
        $brand_id=request()->brand_id;
        foreach($brand_id as $k=>$v){
            $BrandModel=new Brand();
            $reg=$BrandModel->where('brand_id',$v)->update(['is_del'=>2]);
        }
        if($reg){
            $message = [
                'code'=> '000000',
                'msg'=>'删除成功',
                'url'=>'/admin/bindex'

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }else{
            $message = [
                'code'=> '000001',
                'msg'=>'删除失败',

            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
    }
}
