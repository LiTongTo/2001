@extends('admin.layout.layout')
@section('title','后台首页')
@section('content')

   <span class="layui-badge-dot"></span>
  <span class="layui-badge-dot layui-bg-orange"></span>
  <span class="layui-badge-dot layui-bg-green"></span>
  <span class="layui-badge-dot layui-bg-cyan"></span>
  <span class="layui-badge-dot layui-bg-blue"></span>
  <span class="layui-badge-dot layui-bg-black"></span>
  <span class="layui-badge-dot layui-bg-gray" ></span>
  <div style="clear:both;"></div>
 <!--表格-->
 <table>
 <tr>
 <td >
 <table class="layui-table" style="width:300px;">
  <thead>
    <tr >
      <td colspan='2'>订单统计信息</td> 
    </tr> 
  </thead>
  <tbody>
    <tr>
      <td>未处理订单：</td>
      <td>0个</td>
    </tr>
    <tr>
      <td>代发货订单</td>
      <td>10个</td>
    </tr>
    <tr>
      <td>所有订单</td>
      <td>28个</td>
    </tr>
  </tbody>
</table>
</td>
<td style="padding-left:20px;">
   <!--商品统计-->
<table class="layui-table" style="width:300px; ">
  <thead>
    <tr >
      <td colspan='2'>商品统计信息</td> 
    </tr> 
  </thead>
  <tbody>
    <tr>
      <td>商品总数：</td>
      <td>350个</td>
    </tr>
    <tr>
      <td>上架商品</td>
      <td>160个</td>
    </tr>
    <tr>
      <td>下架商品</td>
      <td>15个</td>
    </tr>
  </tbody>
</table>
</td>
<td style="padding-left:20px;">
   <!--商品统计-->
   <table class="layui-table" style="width:300px; ">
  <thead>
    <tr >
      <td colspan='2'>登录统计信息</td> 
    </tr> 
  </thead>
  <tbody>
    <tr>
      <td>会员登录：</td>
      <td>350个</td>
    </tr>
    <tr>
      <td>普通用户</td>
      <td>500个</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
 
</td>
<td style="padding-left:20px;">
  <!--最新消息-->
<table class="layui-table" style="width:300px; ">
  <thead>
    <tr >
      <td colspan='2'>最新消息</td> 
    </tr> 
  </thead>
  <tbody>
    <tr>
      <td colspan='2'>
      <span class="layui-badge-dot layui-bg-cyan"></span>
       8月份处理了500个订单
      </td>
      
    </tr>
    <tr>
      <td colspan='2'> 
       <span class="layui-badge-dot layui-bg-cyan"></span>
         9月份的工作安排
       </td>
     
    </tr>
    <tr>
      <td colspan='2'> 
       <span class="layui-badge-dot layui-bg-cyan"></span>
       后台系统的维护
       </td>
     
    </tr>
  </tbody>
</table>

</td>


</tr>
</table>




   <!--白板-->

<div style="padding: 20px; margin-top:20px; background-color: #F2F2F2;">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6">
      <div class="layui-card">
        <div class="layui-card-header">后台系统</div>
        <div class="layui-card-body">
          时间
        </div>
      </div>
    </div>
    <div class="layui-col-md6">
      <div class="layui-card">
        <div class="layui-card-header">后台管理</div>
        <div class="layui-card-body">
          Admin
        </div>
      </div>
    </div>
    <div class="layui-col-md12">
      <div class="layui-card">
        <div class="layui-card-header">标题</div>
        <div class="layui-card-body">
          内容
        </div>
      </div>
    </div>
  </div>
</div> 



 
<!--进度条-->

<p style="margin-top:20px; color:#808080;">商城用户</p>
<div class="layui-progress" lay-showpercent="true" >
  <div class="layui-progress-bar" lay-percent="80%"></div>
</div>
<br>
<p style="color:#808080;">交易</p>
<div class="layui-progress" lay-showpercent="true">
  <div class="layui-progress-bar" lay-percent="50%"></div>
</div>
<br>
<p style="color:#808080;">分销</p>
<div class="layui-progress layui-progress-big" lay-showpercent="true">
  <div class="layui-progress-bar" lay-percent="20%"></div>
</div>

@endsection
  
  
  
 