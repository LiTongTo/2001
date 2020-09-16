@extends('admin.layout.layout')
@section('title','商品修改 ')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">商品管理</a>
  <a><cite>商品修改</cite></a>
</span>
    @if ($errors->any())
        <div class="alert alert-danger" style=' margin-top:20px;padding-left:20px;padding-top:10px;padding-bottom:10px; background-color:pink;'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:#ff0000; margin-top:6px;">.{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="layui-form" action="{{url('goods/update/'.$goods_data->goods_id)}}" method='post' style="margin-top:20px;">
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="goods_name" lay-verify="title" autocomplete="off" value="{{$goods_data->goods_name}}"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品图片</label>
            <div class="layui-input-block">
                <div class="layui-upload-drag" id="test10">
                    <i class="layui-icon"></i>
                    <p>点击上传，或将文件拖拽到此处</p>
                    <div @if(!$goods_data->goods_img) class="layui-hide" @endif id="uploadDemoView">
                        <hr>
                        <img src="{{$goods_data->goods_img}}" alt="上传成功后渲染" style="max-width: 196px">
                    </div>
                </div>
            </div>
            <input type='hidden'name='goods_img' value="{{$goods_data->goods_img}}">
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">商品号</label>
            <div class="layui-input-block">
                <input type="text" name="goods_sn" lay-verify="title" autocomplete="off" value="{{$goods_data->goods_sn}}"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品分类</label>
            <div class="layui-input-block">
                <select name="cate_id" lay-filter="aihao">
                    <option value=""selected=""></option>
                    @foreach($data as $k=>$v)
                        <option value="{{$v->cate_id}}"  {{$goods_data->cate_id==$v->cate_id?'selected':''}}>{{str_repeat('—',$v->level*3)}}{{$v->cate_name}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <select name="brand_id" lay-filter="aihao">
                    <option value=""selected=""></option>
                    @foreach($brand_data as $k=>$v)
                        <option value="{{$v->brand_id}}"  {{$goods_data->brand_id==$v->brand_id?'selected':''}}>{{$v->brand_name}}</option>
                    @endforeach

                </select>
                {{--                <input type="text" name="" lay-verify="title" autocomplete="off"  class="layui-input">--}}
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品价格</label>
            <div class="layui-input-block">
                <input type="text" name="goods_price"  value="{{$goods_data->goods_price}}" lay-verify="title" autocomplete="off"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品数量</label>
            <div class="layui-input-block">
                <input type="text" name="goods_store"  value="{{$goods_data->goods_store}}" lay-verify="title" autocomplete="off"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品简介</label>
            <div class="layui-input-block">
                <textarea name="goods_dese" id="" cols="30" rows="10">{{$goods_data->goods_dese}}</textarea>
{{--                <input type="text" name="goods_dese"   value="" lay-verify="title" autocomplete="off"  class="layui-input">--}}
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否展示</label>
            <div class="layui-input-block">
                <input type="radio" name="is_show" value="1" title="是" {{$goods_data->is_show==1?'checked':''}}>
                <input type="radio" name="is_show" value="2" title="否" {{$goods_data->is_show==2?'checked':''}}>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否热门</label>
            <div class="layui-input-block">
                <input type="radio" name="is_hot" value="1" title="是" {{$goods_data->is_hot==1?'checked':''}}>
                <input type="radio" name="is_hot" value="2" title="否" {{$goods_data->is_hot==2?'checked':''}}>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_up" value="1" title="是" {{$goods_data->is_up==1?'checked':''}}>
                <input type="radio" name="is_up" value="2" title="否" {{$goods_data->is_up==2?'checked':''}}>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否新品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" title="是" {{$goods_data->is_new==1?'checked':''}}>
                <input type="radio" name="is_new" value="2" title="否" {{$goods_data->is_new==2?'checked':''}}>
            </div>
        </div>
        <button type="submit" style="margin-left:35px; margin-top:20px;" class="layui-btn">修改</button>
    </form>
@endsection
