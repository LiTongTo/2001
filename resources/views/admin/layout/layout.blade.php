<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/static/css/layui.css">
 
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">后台控制中心</a></div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://img.2001.com/uploads/wcwMr3gVOzdajl2pqehre4VQqPj6vGD1JwagPYFJ.jpeg" class="layui-nav-img">
          蓝山夏
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">臣退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
     
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
      @php $name=Route::currentRouteName();@endphp
      
        <!--layui-nav-itemed-->
        <li class="layui-nav-item ">
          <a class="" href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/goods_add">商品添加</a></dd>
            <dd><a href="/admin/goods_add_do">商品列表</a></dd>
            <dd><a href="/admin/goods_imgs">商品相册</a></dd>
            <dd><a href="/admin/goods_imgslist">相册列表</a></dd>
          </dl>
        </li>
       
        <li @if(strpos($name,'brand')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item"@endif>
            <a href="javascript:;">品牌管理</a>
            <dl class="layui-nav-child">
            <dd @if($name=='brand.create') class='layui-this'@endif><a href="/admin/brand">品牌添加</a></dd>
            <dd @if($name=='brand') class='layui-this'@endif><a href="/admin/bindex">品牌列表</a></dd>
            
          </dl>
        </li>
        <li class="layui-nav-item">
                 <a href="">分类管理</a>
            <dl class="layui-nav-child">
            <dd><a href="/admin/brand">分类添加</a></dd>
            <dd><a href="/admin/bindex">分类列表</a></dd>
            
          </dl>
         </li>

      </ul>
    </div>
  </div>
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">@yield('content')</div>
  </div>
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/layui.js"></script>
<script>
//JavaScript代码区域
@php $name=Route::currentRouteName();@endphp

layui.use('element', function(){
  var element = layui.element;
  
});

layui.use('upload', function(){
  var $ = layui.jquery,upload = layui.upload;
    //拖拽上传
  upload.render({
    elem: '#test10'
    ,url: 'http://2001.com/admin/upload' //改成您自己的上传接口
    ,done: function(res){
      layer.msg(res.msg);
      layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.result);
      layui.$('input[name="brand_logo"]').attr('value',res.result);
    }
  });

  //多图片上传
  upload.render({
    elem: '#test2'
    ,url: '/admin/goods_imgsdo' //改成您自己的上传接口
    ,multiple: true
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
      //   $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
      });
    }
    ,done: function(res){
      //上传完毕
      layer.msg(res.msg);
      $('#demo2').append('<img src="'+ res['result'] +'" alt="'+ res["result"] +'" class="layui-upload-img">')
      $("#demo2").append('<input type="hidden" name="goods_imgs[]" value="'+res["result"]+'">');
    }
  });
});

layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});

</script>
</body>
</html>