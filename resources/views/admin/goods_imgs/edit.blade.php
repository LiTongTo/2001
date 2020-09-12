@extends('admin.layout.layout')
@section('title','商品相册 ')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">商品相册管理</a>
  <a><cite>商品相册修改</cite></a>
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
    <form class="layui-form" action="/admin/imgsdo" method='post' style="margin-top:20px;">

        <div class="layui-form-item" style="margin-left: -10px;">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <select name="goods_id">
                  <option value="">请选择</option>
                   @foreach($data as $k=>$v)
                       @if($v->goods_id==$reg->goods_id)
                       <option value="{{$v->goods_id}}"  selected>{{$v->goods_name}}</option>
                       @else
                       <option value="{{$v->goods_id}}" >{{$v->goods_name}}</option>
                       @endif
                    @endforeach
                </select>
            </div>
        </div>
        <label class="layui-form-label"style="margin-left: -10px;" >商品相册</label>
        <div class="layui-upload" style="margin-left: 90px;">
       
            <button type="button" class="layui-btn" id="test2">多图片上传</button>
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                <div class="layui-upload-list" id="demo2">
                @php $goods_imgs=explode('|',$reg->goods_imgs);@endphp
                   @foreach($goods_imgs as $k=>$v)
                   <img src="{{$v}}" alt=""/>
                   @endforeach
                </div>
                
            </blockquote>

        </div>



        <button type="submit" style="margin-left:100px; margin-top:20px;" class="layui-btn">添加</button>
    </form>
@endsection