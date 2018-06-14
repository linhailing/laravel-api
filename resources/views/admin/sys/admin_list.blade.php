@extends('admin.layout.master')
@section('content')
<div class="topnav">
  <div class="wp cl">
    <div class="l">{{@$title}}</div>
    <div class="r">
      <span class="r_nav">
        [<a rel="nofollow" href="javascript:history.go(-1);">添加管理员</a>]
      </span>
    </div>
  </div>
</div>
<div class="">
<table class="table">
  <thead>
  
  </thead>
</table>
</div>
@endsection

@section('script')
<script>
$(function(){
});
</script>
@endsection