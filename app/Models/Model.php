<?php
namespace App\Models;

class Model{
  public function fields($data) {
		return '`'.implode('`,`', array_keys($data)).'`';
	}
	public function values($data) {
		$sql = array();
		foreach ($data as $key=>$value) {
			$sql[] = ':'.$key;
		}
		return implode(',', $sql);
  }
  private static $sys = null;
	public static function Sys() {
		if (!self::$sys) self::$sys = new Sys();
		return self::$sys;
	}
}