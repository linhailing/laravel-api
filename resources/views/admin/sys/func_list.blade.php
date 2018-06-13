@extends('admin.layout.master')
@section('content')
<div class="topnav">
  <div class="wp cl">
    <div class="l">{{@$title}}</div>
    <div class="r">
      <span class="r_nav">
        [<a rel="nofollow" href="{{url('/admin/sys/app_op')}}">添加应用</a>]
      </span>
    </div>
  </div>
</div>
<br>
<table class="table table-border table-bordered table-hover table-bg">
  @if(@$funcs)
    @foreach($funcs as $func)
      <thead>
        <tr>
        </tr>
        <tr>
          <th>编号</th>
          <th>功能代码</th>
          <th>功能名称</th>
          <th>功能网站</th>
          <th>功能图标</th>
          <th>排序</th>
          <th>状态</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    @endforeach
  @endif
  @if(@$napps)
      @foreach($napps as $app)
      <thead>
        <tr>
        <th colspan="8">{{$app->app_name}}({{$app->app_ename}} - @if($app->status == 0) 不可用 @elseif($app->status == 1) 可用 @endif - {{$app->app_id}} )
        <a href="{{url('/admin/sys/app_edit',['id'=>$app->app_id])}}" class="btn btn-success radius size-MINI">修改应用</a>
        <a href="" class="btn btn-danger radius size-MINI">删除应用</a>
        </th>
        </tr>
        <tr>
          <th class="text-c">编号</th>
          <th class="text-c">功能代码</th>
          <th class="text-c">功能名称</th>
          <th class="text-c">功能网站</th>
          <th class="text-c">功能图标</th>
          <th class="text-c">排序</th>
          <th class="text-c">状态</th>
          <th>操作 <a href="{{url('/admin/sys/func_op',['app_id'=>$app->app_id])}}" class="btn btn-success radius size-MINI">添加功能</a></th>
        </tr>
      </thead>
      <tbody>
      <tr>
      <td colspan="8">暂时操作</td>
      </tr>
      </tbody>
      @endforeach
    @endif
</table>

@endsection
