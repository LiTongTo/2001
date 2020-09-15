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
    <a href="/admin/index"><div class="layui-logo">后台控制中心</div></a>
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
    @if(session('login')=='')
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="/admin/reg">
          登录
        </a>

      </li>

    </ul>
    @else
      <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
          <a href="javascript:;">
           欢迎 @php echo session('login')->admin_name;@endphp
          </a>
          <dl class="layui-nav-child">
            <dd><a href="">基本资料</a></dd>
            <dd><a href="">安全设置</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="/admin/quit/">退出</a></li>
      </ul>
    @endif
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
      @php $name=Route::currentRouteName();@endphp

        <!--layui-nav-itemed-->
        <li @if(strpos($name,'goods')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item"@endif>
          <a class="" href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd @if($name=='goods.create') class='layui-this' @endif><a href="/admin/goods">商品添加</a></dd>
            <dd @if($name=='goods') class='layui-this' @endif ><a href="/admin/gindex">商品列表</a></dd>

          </dl>
        </li>

        <li @if(strpos($name,'brand')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item"@endif>
            <a href="javascript:;">品牌管理</a>
            <dl class="layui-nav-child">
            <dd @if($name=='brand.create') class='layui-this'@endif><a href="/admin/brand">品牌添加</a></dd>
            <dd @if($name=='brand') class='layui-this'@endif><a href="/admin/bindex">品牌列表</a></dd>

          </dl>
        </li>

         <li @if(strpos($name,'cate')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item"@endif>
            <a href="javascript:;">分类管理</a>
            <dl class="layui-nav-child">




            <dd @if($name=='cate.create') class='layui-this'@endif><a href="/admin/cate">分类添加</a></dd>
            <dd @if($name=='cate') class='layui-this'@endif><a href="/admin/cate_index">分类列表</a></dd>


          </dl>
        </li>
         </li>

        <li @if(strpos($name,'user')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item" @endif>
          <a href="javscript:;">管理员管理</a>
          <dl class="layui-nav-child">
            <dd @if($name=='user.create') class='layui-this'@endif><a href="/admin/create">管理员添加</a></dd>
            <dd @if($name=='user') class='layui-this'@endif><a href="/admin/list">管理员列表</a></dd>

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
    ,url: '/admin/upload' //改成您自己的上传接口
    ,done: function(res){
      layer.msg(res.msg);
      layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.result);
      layui.$('input[name="brand_logo"]'&&'input[name="goods_img"]').attr('value',res.result);
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
