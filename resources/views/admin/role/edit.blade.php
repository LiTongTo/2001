@extends('admin.layout.layout')
@section('title','角色修改')
@section('content')
<span class="layui-breadcrumb"  >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">角色管理</a>
  <a href="javascript:;">角色修改</a>
</span>

<form class="layui-form" action="{{url('/role/roup/'.$data->role_id)}}" method="post" lay-filter="example" style="margin-top:20px;" >
    @if ($errors->any())
        <div class="alert alert-danger" style="padding-bottom: 20px;padding-left: 20px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="margin-top:10px; color:#ff0000">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
            <input type="text" name="role_name" lay-verify="title" value="{{$data->role_name}}" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色简介</label>
        <div class="layui-input-block">
        <textarea name="role_desc" cols="30" rows="10">{{$data->role_desc}}</textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            <button type="submit" class="layui-btn">修改</button>
        </div>
    </div>

</form>
@endsection