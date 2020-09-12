<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cate;
use App\Models\Brand;
//use Illuminate\Support\Facades\Request;

class GoodsController extends Controller
{
    #商品视图
    public function goods()
    {
        $data = Cate::get();
        $data=self::list_level($data->toArray());
//        echo "<pre>";
//        print_r($data);
//        echo "<pre/>";die;
        $brand_data = Brand::get();
        return view('admin.goods.goods',['data'=>$data,'brand_data'=>$brand_data]);
    }

    public function store(Request $request)
    {
//        dd('www');
        $post = $request->except(['_token']);
        $GoodsModel = new Goods();
        $res = $GoodsModel->create($post);
        //dd($res);exit;
        if ($res) {
            return redirect('admin/gindex');
        }
    }

    public function gindex()
    {
        $data = Goods::leftJoin('brand', 'goods.brand_id', '=', 'brand.brand_id')
                        ->leftJoin('cate', 'goods.cate_id', '=', 'cate.cate_id')
                        ->select('goods.*','cate.cate_name','brand.brand_name')
                        ->get();
//        dd($data);
        return view('admin.goods.gindex', ['data' => $data]);
    }

    public function del()
    {
//        dump($id);
     $data = request()->all();
//        dd($data);
        $res = Goods::where('goods_id', $data['goods_id'])->delete();
        if ($res) {
            if (request()->ajax()) {
                return json_encode(['error_no' => '1', 'error_msg' => '删除成功']);
            }
            return redirect('brand/gindex');



        }
    }
    public function edit(){
        $brand_data = Brand::get();
        $id=request()->id;
        $GoodsModel=new Goods();
        $data = Cate::get();
        $data=self::list_level($data);
        $goods_data=$GoodsModel->where('goods_id',$id)->first();
//        dd($goods_data);
        return view('admin.goods.edit',['data'=>$data,'goods_data'=>$goods_data,'brand_data'=>$brand_data]);


    }

    public function update($id){
        $request=request();
//        dd($request);
        $data = $request->except(['_token','file']);
        $res=Goods::where('goods_id',$id)->update($data);
        if($res!==false){
            return redirect('admin/gindex');
        }else{
            return redirect('admin/edit');
        }
    }

//无限极分类
    public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
    {
//        dd($data);
        static $array=[];
        foreach($data as $k=>$v){
            if($pid==$v['parent_id']){
                $v['level']=$level;
                $array[]=$v;
                self::list_level($data,$v['cate_id'],$level+1);
            }
        }
//        dd($array);
        return $array;
    }

////即点即改
//    public function jidian(Request $request){
//        $goods_id=$request->goods_id;
//        $goods_name=$request->goods_name;
//        $_val=$request->_val;
//        $GoodsModel=new Goods();
//        $reg=$GoodsModel::where('goods_id',$goods_id)->update([$goods_name=>$_val]);
//
//        if($reg=='0'){
//            $message = [
//                'code'=> '000',
//                'msg'=>'未做修改',
//
//            ];
//            return json_encode($message,JSON_UNESCAPED_UNICODE);
//        }else if($reg=='1'){
//            $message = [
//                'code'=> '001',
//                'msg'=>'修改成功',
//
//            ];
//            return json_encode($message,JSON_UNESCAPED_UNICODE);
//            // return $this->success('修改成功');
//        }else{
//            $message = [
//                'code'=> '002',
//                'msg'=>'修改失败',
//
//            ];
//            return json_encode($message,JSON_UNESCAPED_UNICODE);
//        }
//
//    }



}
