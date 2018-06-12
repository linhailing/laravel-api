<?php
namespace App\Api\Controllers;

class UserController extends ApiController{
  public function index(){
    //$this->paramError();
    $msg = 'error show';
    //$this->error($msg);
    $this->token();
  }
}