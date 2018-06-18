<?php
namespace App\Tools;

use App\Models\Model;
use Cache;
use Carbon\Carbon;

class MemcachedManage{
  private static $year = 86400*7;//七天
  private static $day = 86400; //一天
  public static function getUserInterest($uid) {
    return self::cache([Model::Sys(), 'getUserInterest'], [$uid], self::$day); 
  }
  public static function cache($func, $params = [], $seconds = 3600){
    $key = self::cache_param($func, $params);
    $value = self::CacheInstanceGet($key);
    if(!$value){
      $value = call_user_func_array($func, $params);
      self::CacheInstanceSet($key, $value, $seconds);
    }
    return $value;
  }
  private static function cache_param($func, $params){
    $key = '';
    if(is_string($func)){
      $key .= $func;
    }else if(is_array($func)){
      foreach($func as $info){
        if(is_object($info)) $key .= get_class($info);
        if(is_string($info)) $key .= '_'.$info;
      }
    }
    $key = $key.'_'.implode('_', array_values($params));
    $key = last(explode('\\', $key));
    return $key;
  }
  //get cache
  private static function CacheInstanceGet($key, $val = null){
    if(!Cache::has($key)) return $val;
    return Cache::get($key);
  }
  private static function CacheInstanceSet($key, $value, $lifetime = null){
    $minutes = intval($lifetime/60);
    if($minutes < 1) $minutes = 1;
    $expires = Carbon::now()->addMinutes($minutes);
    return Cache::put($key, $value, $expires);
  }
  private static function CacheInstanceDelete($key) {
		return Cache::forget($key);
	}
}