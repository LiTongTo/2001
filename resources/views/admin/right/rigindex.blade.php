@extends('admin.layout.layout')
@section('title','权限展示')
@section('content')
<span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">权限管理</a>
  <a href="javascript:;">权限展示</a>
</span>


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
                <td align='center'>路由别名</td>
                <td align='center'>添加时间</td>
                <td align='center'>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($reg as $k=>$v)
                <tr>
                    <td align='center'>{{$v->right_id}}</td>
                    <td align='center'>
                        {{str_repeat("-",$v->level*3)}}{{$v->right_name}}
                    </td>
                    <td align='center'>{{$v->right_url}}</td>
                    <td align='center'>{{$v->right_as}}</td>
                    <td align='center'>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
                    <td align='center'>
                        <div class="layui-btn-group">
                            <a href="{{url('/right/rigedit/'.$v->right_id)}}" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
                            <a href="javascript:;" right_id="{{$v->right_id}}"  class="layui-btn layui-btn-sm del"><i class="layui-icon"></i></a>
                          

                        </div>
                    </td>
                </tr>
            @endforeach
           
            </tbody>

        </table>

@endsection
<script src="/static/js/jquery.js"></script>
<script>
       $(document).on('click','.del',function(){
        $al=confirm('确定要删除吗！')
               if($al==true){
                var right_id=$(this).attr('right_id')
                $.ajax({
                        data:{'right_id':right_id},
                        url:'/right/rigdel',
                        type:'get',
                        dataType:'json',
                        success:function(reg){
                            if(reg.code=='000001'){
                                 alert(reg.msg)
                                 location.href=reg.url
                            }
                            if(reg.code=='000000'){
                                 alert(reg.msg)
                                 location.href=reg.url
                            }
                            if(reg.code=='000002'){
                                 alert(reg.msg)
                                 location.href=reg.url
                            }
                        }
                   })
               }else{
                 console.log('qvxiao')
               }
      })
</script>