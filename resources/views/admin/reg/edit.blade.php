@extends('admin.layout.layout')
@section('title','管理员添加添加 ')
@section('content')
    <h1><center>修改管理员</center></h1>
    <form class="layui-form" action="{{url('/admin/update/'.$data->admin_id)}}" method="post" lay-filter="example">
        <div class="layui-form-item">
            <label class="layui-form-label">管理员名称</label>
            <div class="layui-input-block">
                <input type="text" name="admin_name" value="{{$data->admin_name}}" lay-verify="title" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">管理员密码</label>
            <div class="layui-input-block">
                <input type="password" name="admin_pwd" value="{{$data->admin_pwd}}"  autocomplete="off" class="layui-input">
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