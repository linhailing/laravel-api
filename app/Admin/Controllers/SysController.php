<?php
namespace App\Admin\Controllers;
use Illuminate\Http\Request;
use App\Models\Model;

class SysController extends AdminController{
  public function index(){

  }
  public function func_list(){
    $D = [];
    $D['title'] = '功能管理';
    $D['breadname'] = '功能管理';
    $functions = Model::Sys()->functions();
    $funcs = array();
		foreach ($functions as $func) {
			$funcs[$func->app_id]['app_id'] 		= $func->app_id;
			$funcs[$func->app_id]['app_name'] 		= $func->app_name;
			$funcs[$func->app_id]['app_ename'] 		= $func->app_ename;
			$funcs[$func->app_id]['app_img'] 		= $func->app_img;
			$funcs[$func->app_id]['app_order'] 		= $func->app_order;
			$funcs[$func->app_id]['app_status'] 	= $func->app_status;

			$funcs[$func->app_id]['children'][$func->func_id]['func_id'] 		= $func->func_id;
			$funcs[$func->app_id]['children'][$func->func_id]['func_name'] 		= $func->func_name;
			$funcs[$func->app_id]['children'][$func->func_id]['func_ename'] 	= $func->func_ename;
			$funcs[$func->app_id]['children'][$func->func_id]['func_url'] 		= $func->func_url;
			$funcs[$func->app_id]['children'][$func->func_id]['func_img'] 		= $func->func_img;
			$funcs[$func->app_id]['children'][$func->func_id]['func_order'] 	= $func->func_order;
			$funcs[$func->app_id]['children'][$func->func_id]['func_status'] 	= $func->func_status;
		}
    $napps = Model::Sys()->napps();
    $D['funcs'] = $funcs;
    $D['napps'] = $napps;
    return view('admin.sys.func_list',$D);
  }
  public function func_op(Request $request, $app_id){
    $D = [];
    $app_id  = $app_id;
    $func_id = $request->get('func_id', 0);
    if(!empty($func_id)){
      $D['title'] = '修改功能';
    }else{
      $D['title'] = '添加功能';
    }
    $apps = Model::Sys()->apps();
    $D['apps'] = $apps;
    $D['app_id'] = $app_id;
    return view('admin.sys.func_set', $D);
  }
  public function func_post(Request $request){
    $data = [];
    $app_id = $request->get('app_id', 0);
    $func_id = $request->get('func_id', 0);
    $func_name = $request->get('func_name', '');
    $func_ename = $request->get('func_ename', '');
    $func_url = $request->get('func_url', '');
    $func_order = $request->get('func_order', '');
    $status = $request->get('status', '');
    $data['app_id'] = $app_id;
    $data['func_name'] = $func_name;
    $data['func_ename'] = $func_ename;
    $data['func_url'] = $func_url;
    $data['func_order'] = $func_order;
    $data['status'] = $status;
    if(!empty($func_id)){
      Model::Sys()->sys_app_function_update($data, $func_id);
    }else{
      Model::Sys()->sys_app_function_install($data);
    }
    return redirect('admin/sys/func_list');
  }
  public function app_op(){
    $D = [];
    return view('admin.sys.app_set', $D);
  }
  public function app_edit(){
    echo 'edit';
  }
  public function app_post(Request $request){
    $data = [];
    $app_id = $request->get('app_id', 0);
    $app_name = $request->get('app_name', '');
    $app_ename = $request->get('app_ename', '');
    $app_order = $request->get('app_order', '');
    $status = $request->get('status', '');
    $data['app_name'] = $app_name;
    $data['app_ename'] = $app_ename;
    $data['app_order'] = $app_order;
    $data['status'] = $status;
    if(!empty($app_id)){
      Model::Sys()->sys_app_update($data, $app_id);
    }else{
      Model::Sys()->sys_app_install($data);
    }
    return redirect('admin/sys/func_list');
  }
}