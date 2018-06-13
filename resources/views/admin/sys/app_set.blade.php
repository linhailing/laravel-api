@extends('admin.layout.master')
@section('content')
<div class="topnav">
  <div class="wp cl">
    <div class="l">{{@$title}}</div>
    <div class="r">
      <span class="r_nav">
        [<a rel="nofollow" href="javascript:history.go(-1);">返回</a>]
      </span>
    </div>
  </div>
</div>
<div class="">
  <form class="form form-horizontal" id="submit_form" method="post" action="{{url('/admin/sys/func_post')}}">
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">应用名称:</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input class="input-text" type="text" name="app_name">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">应用代码:</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input class="input-text" type="text" name="app_ename">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">排序:</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input class="input-text" type="text" name="app_order">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">状态:</label>
      <div class="formControls col-xs-8 col-sm-9">
        <span class="select-box">
          <select class="select" size="1" name="status">
            <option>请选择</option>
            <option value="0">不可用</option>
            <option value="1">可用</option>
          </select>
        </span>  
      </div>
    </div>
    <div class="row cl">
      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
        <input type="submit" class="btn btn-primary radius" value="提交">
        <a  class="btn btn-primary radius" href="javascript:history.go(-1);">返回</a>
      </div>
    </div>
  </form>
</div>
@endsection

@section('script')
<script>
$(function(){
  $('#submit_form').validate({
    rules:{
      app_name:{
        required:true,
      },
      app_ename:{
        required:true,
      },
      app_order:{
        required:true,
        digits:true
      }
    },
    onkeyup:false,
		focusCleanup:true,
		success:"valid",
  });
});
</script>
@endsection