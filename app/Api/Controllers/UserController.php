<?php
namespace App\Api\Controllers;
use App\Tools\MemcachedManage;

class UserController extends ApiController{
  public function index(){
    $msg = 'error show';
    dd(MemcachedManage::getUserInterest('1000'));
  }
}