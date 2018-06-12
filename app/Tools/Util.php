<?php
namespace App\Tools;

class Util{
  public static function jsonp($data, $callback = 'callback'){
    @header('Content-Type: application/json');
    @header('Expires:-1');
    @header('Cache-Control:no-cache');
    @header('Pragma:no-cache');
		if (isset($_REQUEST[$callback])) {
			header("Access-Control-Allow-Origin:*");
			echo $_REQUEST[$callback].'('.json_encode($data, JSON_UNESCAPED_UNICODE).')';
		} else echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
  }
  //转义数据
  public static function saddslashes($string){
    if (is_array($string)) {
			foreach ($string as $key=>$val) {
				$string[$key] = Util::saddslashes($val);
			}
		} else {
			$string = addslashes($string);
		}
		return $string;
	}
	//日志
	public static function WriteLog($key, $data){
		$ymd = date('Ymd');
		$date = date('Y-m-d H:i:s');
		$file = storage_path('logs')."/{$ymd}_{$key}.log";
		//$ip = IpLocation::getIP();
		$ip = '127.0.0.1';
		$ref = @$_SERVER['HTTP_REFERER'];
		$url = @$_SERVER['REQUEST_URI'];
		if(is_string($data)) $data = json_encode($data, JSON_UNESCAPED_UNICODE);
		$uid = isset($GLOBALS['user_id']) ? @$GLOBALS['user_id'] : 0;

		$params = array('POST' => $_POST);
		$params = empty($_POST) ? '' : json_encode($params, JSON_UNESCAPED_UNICODE);

		$content = "date: {$date}\n";
		$content .= "ip: {$ip}({$uid})\n";
		if (!empty($ref)) $content .= "referer: {$ref}\n";
		if (!empty($url)) $content .= "request: {$url}\n";
		if (!empty($params)) $content .= "params: {$params}\n";
		if (!empty($data)) $content .= "content: {$data}\n";
		$content .= "\n";
		error_log($content, 3, $file);
	}
}