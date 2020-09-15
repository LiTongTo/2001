<div class="layui-form-item div-reg"  >
        <label class="layui-form-label">验证码</label>
        <div class="layui-input-block">
            <img id="imageUrl" src="{{$code['image_url']}}" >
            <input  type="text" name="code" lay-verify="required"  autocomplete="off" class="layui-input codes" style="width:150px; border-radius:10px; float: left;"/>
            <input type="hidden" id="sid" value="{{$code['sid']}}">
            <a href="javascript:;" id="code" ><u class="ad">换一张</u></a>
        </div>
    </div>