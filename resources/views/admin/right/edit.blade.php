@extends('admin.layout.layout')
@section('title','权限修改')
@section('content')
<span class="layui-breadcrumb"  >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">权限管理</a>
  <a href="javascript:;">权限修改</a>
</span>

<form class="layui-form" action="{{url('/right/rigup/'.$reg->right_id)}}" method="post" lay-filter="example" style="margin-top:20px;" >
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
        <label class="layui-form-label">权限</label>
        <div class="layui-input-block">
            <input type="text" name="right_name" lay-verify="title" value="{{$reg->right_name}}" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">URL</label>
        <div class="layui-input-block">
            <input type="text" name="right_url" value="{{$reg->right_url}}" lay-verify="title" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
        <input type="text" name="right_as" value="{{$reg->right_as}}" lay-verify="title" autocomplete="off"  class="layui-input">
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