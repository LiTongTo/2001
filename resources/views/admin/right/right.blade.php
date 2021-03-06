@extends('admin.layout.layout')
@section('title','权限添加')
@section('content')
<span class="layui-breadcrumb"  >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">权限管理</a>
  <a href="javascript:;">权限添加</a>
</span>

<form class="layui-form" action="{{url('/right/rigdo')}}" method="post" lay-filter="example" style="margin-top:20px;" >
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
            <input type="text" name="right_name" lay-verify="title" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">URL</label>
        <div class="layui-input-block">
            <input type="text" name="right_url" lay-verify="title" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
        <input type="text" name="right_as" lay-verify="title" autocomplete="off"  class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
    <label class="layui-form-label">Menu</label>
    <div class="layui-input-block">
      <select name="parent_id" lay-filter="aihao">
        <option value="0">顶级分类</option>
        @foreach($reg as $k=>$v)
        <option value="{{$v->parent_id}}">{{str_repeat('—',$v->level*3)}}{{$v->right_name}}</option>
        @endforeach
       
      </select>
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