<?php
namespace App\Models;

class Sys extends Model{
  public function getUserInterest($uid){
    echo ('init');
    return [
      'uid' => '100',
      'name' => 'zhangsan',
      'age' => '21'
    ];
  }
}