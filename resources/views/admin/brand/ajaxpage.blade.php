
@foreach($data as $k=>$v)
      <tr brand_id='{{$v->brand_id}}'>
        <td><input type="checkbox" name="subox" lay-skin="primary" ></td>
        <td align='center'>{{$v->brand_id}}</td>
        <td align='center' zd="brand_name">
            <input type="text" class='updo' value="{{$v->brand_name}}" style="display:none;"/>
            <span class="updd">{{$v->brand_name}}</span>
        </td>
        <td align='center'>@if($v->brand_logo)<img src="{{$v->brand_logo}}" width="120px">@endif</td>
        <td align='center'>{{$v->brand_url}}</td>
        <td align='center'>
        <div class="layui-btn-group">
          
            <a href='/admin/bedit/{{$v->brand_id}}' class="layui-btn layui-btn-sm"><i class="layui-icon"></i></a>
            <a brand_id="{{$v->brand_id}}" class="layui-btn layui-btn-sm "><i class="layui-icon del"></i></a>
            
  </div>  
        </td>
      </tr>
     @endforeach
       <tr>
           <td colspan="6px">{{$data->appends($query)->links('vendor.pagination.adminshop')}}
           
           </td>
       </tr>