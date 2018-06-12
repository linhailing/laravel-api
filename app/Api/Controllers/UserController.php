<?php
namespace App\Api\Controllers;
use App\Tools\MemcachedManage;

class UserController extends ApiController{
  public function index(){
    //$this->paramError();
    $msg = 'error show';
    //$this->error($msg);
    //dd($this->token());
    //cache
    dd(MemcachedManage::getUserInterest('1000'));
  }
}