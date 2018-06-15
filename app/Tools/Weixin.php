<?php
namespace App\Tools;
use App\Tools\Util;
/**
 * 微信类
 */
class Weixin{
	/***
	 * 微信小程序 获取appid and session_key
	 */
	public static function getWxSessionKey($appid,$secret,$code){
		$url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		return 	Util::curl($url, 30);
	} 
}
