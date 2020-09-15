@extends('admin.layout.layout')
@section('title','权限展示')
@section('content')
<span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">权限管理</a>
  <a href="javascript:;">权限展示</a>
</span>


    <form class="layui-form" action="" style="margin-top:20px;">
        <div class="layui-form-item">
            <div class="layui-inline">

                <div class="layui-input-inline">
                    <input type="text" name="right_name"   autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">

                <div class="layui-input-inline">
                    <button class="layui-btn ">搜索</button>
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
                <td align='center'>权限</td>
                <td align='center'>url</td>
                <td align='center'>简介</td>
                <td align='center'>添加时间</td>
                <td align='center'>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($reg as $k=>$v)
                <tr>
                    <td align='center'>{{$v->right_id}}</td>
                    <td align='center'>{{$v->right_name}}</td>
                    <td align='center'>{{$v->right_url}}</td>
                    <td align='center'>{{$v->right_desc}}</td>
                    <td align='center'>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
                    <td align='center'>
                        <div class="layui-btn-group">
                            <a href="{{url('/admin/rigedit/'.$v->right_id)}}" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
                            <a href="/admin/rigdel/{{$v->right_id}}"  class="layui-btn layui-btn-sm"><i class="layui-icon del"></i></a>
                          

                        </div>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6px">{{--{{$data->appends($query)->links('vendor.pagination.adminshop')}}--}}
                </td>
            </tr>
            
            </tbody>

        </table>

@endsection