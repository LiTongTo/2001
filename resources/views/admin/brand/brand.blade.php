@extends('admin.layout.layout')
@section('title','品牌添加 ')
@section('content')
<span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">品牌管理</a>
  <a><cite>品牌添加</cite></a>
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
<form class="layui-form" action="/brand/bstore" method='post' style="margin-top:20px;">

  <div class="layui-form-item">
    <label class="layui-form-label">品牌名称</label>
    <div class="layui-input-block">
      <input type="text" name="brand_name" lay-verify="title" autocomplete="off"  class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">品牌logo</label>
    <div class="layui-input-block">
      <div class="layui-upload-drag" id="test10">
        <i class="layui-icon"></i>
        <p>点击上传，或将文件拖拽到此处</p>
      <div class="layui-hide" id="uploadDemoView">
      <hr>
         <img src="" alt="上传成功后渲染" style="max-width: 196px">
        </div>
     </div>
    </div>
    <input type='hidden'name='brand_logo'>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">品牌路径</label>
    <div class="layui-input-block">
      <input type="text" name="brand_url" lay-verify="title" autocomplete="off"  class="layui-input">
    </div>
  </div>
  <button type="submit" style="margin-left:35px; margin-top:20px;" class="layui-btn">添加</button>
  </form>
@endsection