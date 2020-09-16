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
        <td align='center'>品牌logo</td>
        <td align='center'>品牌路径</td>
        <td align='center'>操作</td>
      </tr> 
    </thead>
    <tbody>
     @foreach($data as $k=>$v)
      <tr brand_id='{{$v->brand_id}}'>
        <td><input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->brand_id}}"></td>
        <td align='center'>{{$v->brand_id}}</td>
        <td align='center' zd="brand_name">
            <input type="text" class='updo' value="{{$v->brand_name}}" style="display:none;"/>
            <span class="updd">{{$v->brand_name}}</span>
        </td>
        <td align='center'>@if($v->brand_logo)<img src="{{$v->brand_logo}}" width="120px">@endif</td>
        <td align='center' zd="brand_url">
        <input type="text" class='updo' value="{{$v->brand_url}}" style="display:none;"/>
                 <span class='updd'>{{$v->brand_url}}</span>
        </td>
        <td align='center'>
        <div class="layui-btn-group">
          
            <a href='/brand/bedit/{{$v->brand_id}}' class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
            <a brand_id="{{$v->brand_id}}" class="layui-btn layui-btn-sm "><i class="layui-icon del"></i></a>
            
  </div>  
        </td>
      </tr>
     @endforeach
       <tr>
           <td colspan="6px">{{$data->appends($query)->links('vendor.pagination.adminshop')}}
           </td>
       </tr>
    </tbody>
   
  </table>
  

@endsection
<script src="/static/js/jquery.js"></script>
<script>
     $(document).ready(function(){
        //即点即改
          $(".updd").click(function(){//input框显示  自己隐藏
               var _this=$(this);
               _this.hide();
               _this.prev('input').show();
          })
 
          $('.updo').blur(function(){ //失去焦点的时候 获取到id  修改的字段  值
                var brand_id=$(this).parents('tr').attr('brand_id');
                var brand_name=$(this).parent('td').attr('zd');
                var _val=$(this).val();
                $.ajax({
                    url:'/brand/jd',
                    type:'post',
                    data:{'brand_id':brand_id,'brand_name':brand_name,'_val':_val},
                    dataType:'json',
                    success:function(reg){
                      if(reg.code==='000'){
                          window.location.reload()
                      } 
                      if(reg.code==='001'){
                        window.location.reload()
                      }
                      if(reg.code==='002'){
                        window.location.reload()
                      }
                      //console.log(reg);
                    }
                })
          })


          //删除
          $(".del").click(function(){
               $al=confirm('确定要删除吗！')
               if($al==true){
                var  brand_id=$(this).parent('a').attr('brand_id')
                $.ajax({
                        data:{'brand_id':brand_id},
                        url:'/brand/bdel',
                        type:'get',
                        dataType:'json',
                        success:function(reg){
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
         //全选
        $(document).on('click','.layui-form-checkbox:first',function(){
            var checkedval = $('input[name="checkedall"]').prop('checked');
//            alert(checkedval);
            $('input[name="brandcheck[]"]').prop('checked',checkedval);
            if(checkedval){
                $('.layui-form-checkbox:gt(0)').addClass('layui-form-checked');
            }else{
                $('.layui-form-checkbox:gt(0)').removeClass('layui-form-checked');
            }
        })
          //批量删除
        $(document).on('click','.moredel',function(){
            
            var ids = new Array();
            $('input[name="brandcheck[]"]:checked').each(function(i,k){
                ids.push($(this).val());
            })
           
            //return false;
            $.get('/brand/bdels',{brand_id:ids},function (res){
                   //console.log(res);
                    if(res.code=='000000'){
                       
                        location.href=res.url
                    }else{
                      console.log(res.message)
                    }
            },
               'json'
            )
        })

         //ajax分页
         $(document).on("click",".layui-laypage a",function(){
    // alert("123");
          var url = $(this).attr("href");
          // alert(url);
          $.get(url,function(res){
              // console.log(res);
              $("tbody").html(res);
              layui.use('form', function(){
              var form = layui.form;
              form.render();
  //各种基于事件的操作，下面会有进一步介绍
            });
          
          })
          return false;
      })


     })
</script>