@extends('admin.layout.layout')
@section('title','商品相册 ')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">商品相册管理</a>
  <a><cite>商品相册添加</cite></a>
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

        <div class="layui-form-item">
            <label class="layui-form-label">商品id</label>
            <div class="layui-input-block">
                <select name="goods_id">
                       <option>1</option>
                </select>
            </div>
        </div>
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test2">多图片上传</button>
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                <div class="layui-upload-list" id="demo2"></div>
            </blockquote>

        </div>



        <button type="submit" style="margin-left:35px; margin-top:20px;" class="layui-btn">添加</button>
    </form>
@endsection