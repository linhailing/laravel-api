<?php
namespace App\Api\Controllers;
use App\Tools\MemcachedManage;
use App\Tools\Weixin;
use App\Tools\Util;

class UserController extends ApiController{
  public function index(){
    $msg = 'error show';
    dd(MemcachedManage::getUserInterest('1000'));
  }
  public function wx_login(){
  	$appid = $this->req('appid', '');
		$appSecret = $this->req('appSecret', '');
		$code = $this->req('code', '');
		if(empty($appid) || empty($appSecret) || empty($code)){
			return $this->paramError();
		}
		$ret = json_decode(Weixin::getWxSessionKey($appid,$appSecret,$code));
		$data = ['openid'=> $ret->openid, 'session_key'=>$ret->session_key,'expires_in'=>$ret->expires_in];
		return $this->jsonp(['ret'=>0,'data'=>$data]);
  }
}