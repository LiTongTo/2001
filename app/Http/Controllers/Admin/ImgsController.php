<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gimgs;
use DB;


class ImgsController extends Controller
{
    //添加相册视图
    public function goods_imgs()
    {
        return view('admin.goods_imgs.goods_add');
    }

    //相册图片处理
    public function goods_imgsdo(request $request)
    {
       // $photo = request()->file;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $photo = request()->file;
            $store_result = $photo->store('uploads');
            $data = '/' . $store_result;
            // dd($data);
            return json_encode(['code' => 0, 'msg' => '上传成功', 'result' => $data]);
        }
        return json_encode(['code'=>1,'msg'=>'上传失败']);
    }

    //处理图片添加
    public function imgsdo(){
        $data=request()->all();
        $data['goods_imgs']=implode('|',$data['goods_imgs']);
        $goods = new Gimgs();
        $post = $goods->create($data);
        //dd($post);
        return redirect('/admin/goods_imgslist');
    }

    //相册展示
    public function  goods_imgslist(request $request)
    {
       $data = DB::table('gimgs')->where('is_del',1)->paginate(2);
       //dd($data);
        return view('admin.goods_imgs.goods_imgslist',['data'=>$data]);
    }

    //删除
    public function img_del(){
        $id=request()->id;

        $Gimgs=new Gimgs();
        $reg=$Gimgs->where('id',$id)->update(['is_del'=>2]);

        if($reg){
            $message = [
                'code'=> '000000',
                'msg'=>'删除成功',
                'url'=>'/admin/goods_imgslist'

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
