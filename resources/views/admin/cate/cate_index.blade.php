@extends('admin.layout.layout')
@section('title','分类展示')
@section('content')
<span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">分类管理</a>
  <a><cite>分类展示</cite></a>
</span>
<form class="layui-form" style="padding-bottom: 10px; padding-top:15px;padding-left: 10px;">
            分类名称：
            <div class="layui-input-inline">
                <input type="text" name="cate_name"  class="layui-input" value="{{$cate['cate_name']??''}}" placeholder="请输入品牌名称......">
            </div>
            
            <button type="submit" class="layui-btn">搜索</button>
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
     
        <td align='center' >分类id</td>
        <td align='center'>分类名称</td>
        <td align='center'>操作</td>
      </tr> 
    </thead>
    <tbody>
     @foreach($res as $k=>$v)
        <tr cate_id="{{$v->cate_id}}">
            <td>{{$v->cate_id}}</td>
            <td cate_name="cate_name">
            {{str_repeat("—",$v->level*3)}}<span id="span">{{$v->cate_name}}</span>
            <input type="text" class="ded" value="{{$v->cate_name}}" style="display:none">
            </td>
            <td>
            <a  class="layui-btn layui-btn-sm "><i cate_id="{{$v->cate_id}}" class="layui-icon del"></i></a>
            
            </td>
        </tr>
  </div>  
        </td>
      </tr>
     @endforeach
      
    </tbody>
   
  </table>
  

@endsection
<script src="/static/js/jquery.js"></script>
<script>
$(document).on("click","#span",function(){
    var _this = $(this);
    _this.hide();
    _this.next("input").show()
    $(".ded").blur(function(){
      // console.log(22);return;
        var _this = $(this);
        var value = _this.val();
        var cate_id = _this.parents('tr').attr("cate_id");
        var cate_name = _this.parent("td").attr("cate_name");
            var data = {};
            data.cate_id = cate_id;
            data.cate_name = cate_name;
            data.value = value;
            var url = "{{url('/admin/jdjg')}}";
            $.ajax({
                    type:"post",
                    data:data,
                    url:url,
                    dateType:"json",
                    success:function(res){
                        if(res.success==true){
                            _this.prev().text(value).show();
                            _this.hide();
                        }
                        console.log(res);
                            // alert(res.message);
                    }
                })
            
    })
})
$(document).on("click",".del",function(){
        var cate_id = $(this).attr("cate_id");
        // consoleco.log(cate_id);
        var data = {};
            data.cate_id = cate_id;
            var url = "{{url('/admin/cate_del')}}";
        if(window.confirm("是否删除")){
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dateType:"json",
                success:function(res){
                    if(res.code==000000){
                        alert(res.message);
                        history.go(0);
                    }
                }
            })
        }
    })

</script>
    
