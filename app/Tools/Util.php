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
	//urlencode
	public static function encode_url_substr_UTF8($str, $lenlimit) {
		$mblen = mb_strlen($str, "UTF8");
		$realencodelen = 0;
		$outstr = '';
		for ($i = 0; $i < $mblen; $i++) {
			$char = mb_substr($str, $i, 1, 'UTF8');
			if (strlen($char) > 1) {
				$addlen = strlen($char) * 3;
			} else {
				$addlen = 1;
			}
			if ($realencodelen + $addlen < $lenlimit) {
				$outstr .= $char;
				$realencodelen += $addlen;
			}
		}
		return $outstr;
	}
	public static function array2Object($array = []){
		if (is_array($array)) {
			$obj = new \StdClass();
			foreach ($array as $key => $val){
					$obj->$key = $val;
			}
		}else { $obj = $array; }
		return $obj;
	}
	//curl
	public static function curl($url, $timeout = 0) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if ($timeout > 0) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		}

		if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}

		$reponse = curl_exec($ch);
		curl_close($ch);
		return $reponse;
	}
	public static function curlPost($url, $data, $timeout = 0) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$post_data = http_build_query($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_URL, $url);
		if ($timeout > 0) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		}
		if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		$reponse = curl_exec($ch);
		curl_close($ch);
		return $reponse;
	}
	public static function curlPostJson($url, $data, $timeout = 0) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		curl_setopt($ch, CURLOPT_URL, $url);
		if ($timeout > 0) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		}
		if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		$reponse = curl_exec($ch);
		curl_close($ch);
		return $reponse;
	}
}