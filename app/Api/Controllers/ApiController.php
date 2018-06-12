<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Tools\Util;

class ApiController extends Controller{
  public function __construct(){
    parent::__construct();
  }
  public $income = '';
  public $uid = '';
  public $membber = '';
  //参数错误
  public function paramError(){ $this->jsonp(['ret' => 4, 'msg'=> '参数错误！']);}
  //错误显示
  public function error($msg, $ret = 1){ $this->jsonp(['ret' => $ret, 'msg'=> $msg]);}
  //登录错误
  public function loginError(){ $this->jsonp(["ret" => 1, "msg" => '非法的请求或登录已经失效，请重新登录', 'relogin'=>1]); }
  //检查是否登录
  public function checkData(){
    if(!$this->income || $this->uid < 0 || !$this->membber){
      Util::WriteLog('mobile_url_err', '');
      $this->loginError();
    }
  }
  //utf8header
  protected function addUTF8Header() { header("Content-type: text/html; charset=utf-8"); }
  //token
  protected function token(){
    //$this->checkData();
    $this->uid = '1000';
    $time = TIMESTAMP;
    $this->member = [
      'uid' => '1000',
      'gender' => 'f',
      'state' => 1,
      'nickname'=> '测试',
      'username' => 'henry'
    ];
    $this->member = Util::array2Object($this->member);
    $str = "{$this->member->uid}|".strtolower($this->member->gender)."|{$this->member->state}|{$time}";
    $sting = 'test';
    $mdstr = md5($str.$sting);
    $pkey = $str.$mdstr.'|'.urlencode(Util::encode_url_substr_UTF8($this->member->nickname, 60))."|{$this->member->username}|1";
    return $pkey;
  }
}