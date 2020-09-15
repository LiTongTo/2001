@extends('admin.layout.layout')
@section('title','分类添加 ')
@section('content')
<span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">分类管理</a>
  <a><cite>分类添加</cite></a>
</span>
<!-- @if ($errors->any())
<div class="alert alert-danger" style=' margin-top:20px;padding-left:20px;padding-top:10px;padding-bottom:10px; background-color:pink;'>
<ul>
@foreach ($errors->all() as $error)
<li style="color:#ff0000; margin-top:6px;">.{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->

  <div class="layui-form-item" style="margin-top:20px;">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="text" name="cate_name" lay-verify="title" autocomplete="off"  class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">pid</label>
    <div class="layui-input-block">
      <select name="parent_id" id="pid" lay-verify="required" class="layui-input">
        <option value="0">顶级分类</option>
        @foreach($res as $k=>$v)
        <option value="{{$v->parent_id}}">{{str_repeat('—',$v->level*3)}}{{$v->cate_name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" style="margin-left:35px; margin-top:20px;" class="layui-btn ban">添加</button>
  <script src="/static/js/jquery.js"></script>
    <script>
        $(document).on("click",".ban",function(){
            var cate_name = $("input[name='cate_name']").val();
            if(cate_name==""){
              alert("分类不能为空");return;
            }
            var parent_id = $("select[name='parent_id']").val();
            var data = {};
            data.cate_name = cate_name;
            data.parent_id = parent_id;
            var url = "{{url('/admin/cate_add')}}";
            $.ajax({
                type:"post",
                url:url,
                data:data,
                datetype:"json",
                success:function(res){
                    // console.log(res);
                    if(res.error==true){
                      alert(res.message);
                    }
                    if(res.success==true){
                    alert(res.message);
                        location.href="{{url('/admin/cate_index')}}";
                    }
                }
            })
            // console.log(data);


        })
    
    </script>
@endsection