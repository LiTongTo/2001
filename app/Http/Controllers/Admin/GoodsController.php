<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cate;
use App\Models\Brand;
use Validator;
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
      #文件上传
      public function uploads(Request $request){
        $data = $request->file;
        
         if ($request->hasFile('file') && $request->file('file')->isValid()) {
          $photo = request()->file;
          $store_result = $photo->store('uploads');
          $data='/'.$store_result;
       
         //dd($data);
           return json_encode(['code'=>0,'msg'=>'上传成功','result'=>$data]);
     }
           return json_encode(['code'=>1,'msg'=>'上传失败']);
    }

    public function store(Request $request)
    {
//        dd('www');
        $post = $request->except(['_token']);
        //dd($post);
         $validator=Validator::make($post,[
             'goods_name'=>'required|unique:goods',
             'goods_sn'=>'required',
             'cate_id'=>'required',
             'brand_id'=>'required',
             'goods_price'=>'required',
             'goods_img'=>'required',
             'goods_store'=>'required',
             'goods_desc'=>'required',
         ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_sn.required'=>'商品号不能为空 ',
            'cate_id.required'=>'分类不能为空',
            'brand_id.required'=>'品牌不能为空',
            'goods_price.required'=>'商品价格不能为空',
            'goods_img.required'=>'商品图片不能为空',
            'goods_store.required'=>'商品数量不能为空',
            'goods_desc.required'=>'商品详情',
         ]);

         if ($validator->fails()) {
            return redirect('goods/goods')
            ->withErrors($validator)
            ->withInput();
            }
        $GoodsModel = new Goods();
        $res = $GoodsModel->create($post);
        //dd($res);exit;
        if ($res) {
            return redirect('goods/gindex');
        }
    }

    public function gindex()
    {
        $data = Goods::leftJoin('brand', 'goods.brand_id', '=', 'brand.brand_id')
                        ->leftJoin('cate', 'goods.cate_id', '=', 'cate.cate_id')
                        ->where('goods.is_del',1)
                        ->select('goods.*','cate.cate_name','brand.brand_name')
                        ->paginate(3);
//        dd($data);
        return view('admin.goods.gindex', ['data' => $data]);
    }

    public function del()
    {
//        dump($id);
     $data = request()->all();
//        dd($data);
        $res = Goods::where('goods_id', $data['goods_id'])->update(['is_del'=>2]);
        if ($res) {
            if (request()->ajax()) {
                return json_encode(['error_no' => '1', 'error_msg' => '删除成功']);
            }

        }
    }

    #修改视图
    public function edit(){
        $brand_data = Brand::get();
        $id=request()->id;
        $GoodsModel=new Goods();
        $data = Cate::get();
        $data=self::list_level($data);
        $goods_data=$GoodsModel->where('goods_id',$id)->first();
       // dd($goods_data);
        return view('admin.goods.edit',['data'=>$data,'goods_data'=>$goods_data,'brand_data'=>$brand_data]);


    }
   #执行修改
    public function update($id){
        $request=request();
         //dd($request);
        $data = $request->except(['_token','file']);
        $res=Goods::where('goods_id',$id)->update($data);
        if($res!==false){
            return redirect('goods/gindex');
        }else{
            return redirect('goods/edit');
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
