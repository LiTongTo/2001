@extends('admin.layout.layout')
@section('title','管理员列表')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">管理员管理</a>
</span>


    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-inline">

                <div class="layui-input-inline">
                    <input type="tel" name="admin_name" value="{{$data['admin_name']??''}}" placeholder="请输入管理员名称" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">

                <div class="layui-input-inline">
                    <button class="layui-btn layui-btn-normal">搜索</button>
                </div>
            </div>
        </div>
    </form>

    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr >
                <td align='center' >id</td>
                <td align='center'>管理员名称</td>
                <td align='center'>添加时间</td>
                <td align='center'>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td align='center'>{{$v->admin_id}}</td>
                    <td align='center'>{{$v->admin_name}}</td>
                    <td align='center'>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
                    <td align='center'>
                        <div class="layui-btn-group">
                            <a href="{{url('/admin/redit/'.$v->admin_id)}}" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
                            <a href="javascript:void(0)" onclick="del({{$v->admin_id}},this)" class="layui-btn layui-btn-sm"><i class="layui-icon del"></i></a>
                            {{--<a href="{{url('/admin/delete/'.$v->admin_id)}}" class="layui-btn layui-btn-sm "><i class="layui-icon del"></i></a>--}}

                        </div>
                    </td>
                </tr>
            @endforeach
            {{--<tr>--}}
                {{--<td colspan="6px">{{$data->appends($query)->links('vendor.pagination.adminshop')}}--}}
                {{--</td>--}}
            {{--</tr>--}}
            <tr><td colspan="4">
                    {{$data->links('vendor.pagination.adminshop')}}
                </td></tr>
            </tbody>

        </table>

        @endsection
        <script src="/static/js/jquery.js"></script>
        <script>
            function del(admin_id,obj){
                if(!admin_id){
                    return;
                }
                $al=confirm('是否确定删除！');
                if($al==true){
                    $.get('/admin/delete/'+admin_id,function(res){
                        alert(res.msg);
                        //$(obj).parents('tr').hide();
                        location.reload();
                    },'json')
                }

            }
        </script>

