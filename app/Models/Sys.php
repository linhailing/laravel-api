<?php
namespace App\Models;

use DB;
class Sys extends Model{
  public function getUserInterest($uid){
    echo ('init');
    return [
      'uid' => '100',
      'name' => 'zhangsan',
      'age' => '21'
    ];
  }
  public function sys_app_install($data){
    $sql = 'insert into sys_app('.$this->fields($data).') values('.$this->values($data).')';
    return DB::insert($sql, $data);
  }
  public function sys_app_update($data, $id){
    $sql = 'update sys_app set '.$this->set($data).' where app_id = :app_id';
    $data['app_id'] = $id;
    return DB::update($sql,$data);
  }
  public function sys_app_function_install($data){
    $sql = 'insert into sys_app_function('.$this->fields($data).') values('.$this->values($data).')';
    return DB::insert($sql, $data);
  }
  public function sys_app_function_update($data, $id){
    $sql = 'update sys_app_function set '.$this->set($data).' where app_id = :app_id';
    $data['app_id'] = $id;
    return DB::update($sql,$data);
  }
  public function functions() {
		$sql = "select func_id, a.app_id, func_name, func_ename, func_url, func_img, func_order, a.status as func_status,
				app_name, app_ename, app_img, app_order, b.status as app_status
				from sys_app_function as a inner join sys_app as b on a.app_id=b.app_id
				order by app_order asc, func_order asc";
		return DB::select($sql);
  }
  public function apps(){
    $sql = 'select * from sys_app';
    return DB::select($sql);
  }
  public function napps() {
		$sql = "select app_id, app_ename, app_name, app_img, app_order, status
				from sys_app as a
				where not exists(select app_id from sys_app_function where app_id=a.app_id)
				order by app_order asc";
		return DB::select($sql);
	}
}