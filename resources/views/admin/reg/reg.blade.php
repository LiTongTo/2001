<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员登录</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
@if(session('msg'))
<blockquote class="layui-elem-quote" style="font-size:20px;">
{{session('msg')}}
</blockquote>

@endif
<center style="margin-bottom: 20px; margin-top: 20px;"><h1>后台登录</h1></center>
<div style="border:1px solid #000; margin:0px auto; background-color:#fff; width:500px; height:320px;">

<form class="layui-form" action="/admin/regdo"  method="post" style="margin-top:30px; margin-left:20px;" >
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="admin_name" lay-verify="title" autocomplete="off" class="layui-input names" style="width:300px; border-radius:10px;">
            <span name="admin_name"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="admin_pwd" lay-verify="required" autocomplete="off" class="layui-input pwds" style="width:300px; border-radius:10px;">
            <span name="admin_pwd"></span>
        </div>
    </div>
    <div class="layui-form-item div-reg"  >
        <label class="layui-form-label">验证码</label>
        <div class="layui-input-block">
            <img id="imageUrl" src="{{$code['image_url']}}" >
            <input  type="text" name="code" lay-verify="required"  autocomplete="off" class="layui-input codes" style="width:150px; border-radius:10px; float: left;"/>
            <input type="hidden" id="sid" value="{{$code['sid']}}">
            <a href="javascript:;" id="code" ><u class="ad">换一张</u></a>
        </div>
    </div>

    <span style="margin-left:110px;" name="code"></span>
    <div style="width: 216px; margin: 0; margin-left:130px; margin-top:20px; ">
      <button type="submit" class="layui-btn layui-btn-fluid" style="border-radius:6px;">登录</button>
    </div>
  </div>
</form>
<div>
</div>
</body>
</html>

<script src="/static/js/jquery.js"></script>
<script>
    //图片验证
    $(document).ready(function(){
       $(document).on('click','.ad',function(){
           window.location.reload();
        })

        //验证
      $(".names").blur(function(){
        var admin_name = $('input[name="admin_name"]').val();
        if(admin_name==''){
            $('span[name="admin_name"]').html('<span style="color: red;">用户名不能为空</span>')
            $('button[type="submit"]').prop('disabled','disabled');
            return false;
        }else{
            $('span[name="admin_name"]').html('<span style="color: green;">格式正确</span>')
            $('button[type="submit"]').prop('disabled',''); 
        }
    });
        $('.pwds').blur(function(){

            var admin_pwd = $('input[name="admin_pwd"]').val();
            if(admin_pwd==''){
                $('span[name="admin_pwd"]').html('<span style="color: red;">密码不能为空</span>')
                $('button[type="submit"]').prop('disabled','disabled');
                return false;
            }else{
              $('span[name="admin_pwd"]').html('<span style="color: green;">格式正确</span>')
              $('button[type="submit"]').prop('disabled',''); 
            }

        });

        $('.codes').blur(function(){
           
            var code = $('input[name="code"]').val();
            if(code==''){
                $('span[name="code"]').html('<span style="color: red;">验证码不能为空</span>')
                $('button[type="submit"]').prop('disabled','disabled');
                return false;
            }else{
                $('span[name="code"]').html('<span style="color:green;">格式正确</span>')
                $('button[type="submit"]').prop('disabled',''); 
            }

        })
      

})
</script>