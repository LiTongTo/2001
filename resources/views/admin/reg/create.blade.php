@extends('admin.layout.layout')
@section('title','管理员添加添加 ')
@section('content')
<span class="layui-breadcrumb"  >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">管理员管理</a>
  <a href="javascript:;">管理员添加</a>
</span>

<form class="layui-form" action="{{url('/admin/rstore')}}" method="post" lay-filter="example" style="margin-top:20px;" >
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
        <label class="layui-form-label">管理员名称</label>
        <div class="layui-input-block">
            <input type="text" name="admin_name" lay-verify="title" autocomplete="off" placeholder="请输入管理员名称" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">管理员密码</label>
        <div class="layui-input-block">
            <input type="password" name="admin_pwd" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">管理员电话</label>
        <div class="layui-input-block">
            <input type="text" name="admin_tel" placeholder="请输入手机号" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
           @foreach($data as $k=>$v)
            <input type="checkbox" name="role[]" lay-skin="primary" value="{{$v['role_id']}}" title="{{$v['role_name']}}" >
            @endforeach
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            <button type="submit" class="layui-btn">添加</button>
        </div>
    </div>

</form>
@endsection