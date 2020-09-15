@extends('admin.layout.layout')
@section('title','品牌展示')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">商品管理</a>
  <a><cite>商品相册展示</cite></a>
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
                <td>

                    <span id='flag'>全选</span>
                </td>
                <td align='center' >品牌id</td>
                <td align='center'>品牌名称</td>
                <td align='center'>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>
                        @php $goods_imgs = explode("|",$v->goods_imgs);@endphp
                        @foreach($goods_imgs as $vv)
                            <img src="{{$vv}}"  width="50px">
                        @endforeach
                        {{--{{$v->goods_imgs}}--}}
                    </td>
                    <td align='center'>
                        <div class="layui-btn-group">
                            <a href='/admin/imgedit/{{$v->id}}' class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
                            <a imgs_id="{{$v->id}}" class="layui-btn layui-btn-sm del "><i class="layui-icon "></i></a>

                        </div>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6px">{{$data->links('vendor.pagination.adminshop')}}
                </td>
            </tr>
            </tbody>

        </table>


        @endsection
        <script src="/static/js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                //删除
                {{--$(".del").click(function(){--}}
                    {{--var ids = $(this).attr('ids');--}}
                    {{--// alert(ids)--}}
                    {{--if(window.confirm("是否删除")){--}}
                        {{--var data = {};--}}
                        {{--data.ids=ids;--}}
                        {{--var url = "{{url('/img_del')}}";--}}
                        {{----}}
                    {{--}--}}
                {{--})--}}

                //删除
                $(".del").click(function(){
                    $al=confirm('确定要删除吗！')
                    if($al==true){
                        var id=$(this).attr('imgs_id')

                        $.ajax({
                            data:{'id':id},
                            url:'/admin/img_del',
                            type:'post',
                            dataType:'json',
                            success:function(reg){
                                // console.log(reg);
                                if(reg.code=='000000'){
                                    location.href=reg['url'];
                                }else{
                                    alert('reg.message');
                                }
                            }
                        })
                    }else{
                        console.log('qvxiao')
                    }
                })
            })
        </script>