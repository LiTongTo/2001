@extends('admin.layout.layout')
@section('title','品牌展示')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">品牌管理</a>
  <a><cite>品牌展示</cite></a>
</span>
    <form class="layui-form" style="padding-bottom: 10px; padding-top:15px;padding-left: 10px;">
        品牌名称：
        <div class="layui-input-inline">
            <input type="text" name="brand_name"  class="layui-input" value="{{$brand['brand_name']??''}}" placeholder="请输入品牌名称......">
        </div>
        品牌网址：
        <div class="layui-input-inline">
            <input type="text" name="brand_url" class="layui-input" value="{{$brand['brand_url']??''}}" placeholder="请输入品牌网址......">
        </div>
        <button type="submit" class="layui-btn">搜索</button>
    </form>
    <button type="button" class="layui-btn layui-btn-primary moredel">批量删除</button>
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
                    <input type="checkbox" name="checkedall"  lay-skin="primary"  >
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
                    <td>{{$v->goods_id}}</td>
                    <td>
                        @php $goods_imgs = explode("|",$v->goods_imgs);@endphp
                        @foreach($goods_imgs as $vv)
                            <img src="{{$vv}}" >
                        @endforeach
                        {{--{{$v->goods_imgs}}--}}
                    </td>
                    <td align='center'>
                        <div class="layui-btn-group">
                            <a href='/admin/bedit/{{$v->id}}' class="layui-btn layui-btn-sm"><i class="layui-icon"></i>修改</a>
                            <a imgs_id="{{$v->id}}" class="layui-btn layui-btn-sm del "><i class="layui-icon "></i>删除</a>

                        </div>
                    </td>
                </tr>
            @endforeach
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