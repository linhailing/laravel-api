<?php
namespace App\Admin\Controllers;

class WelcomeController extends AdminController{
  public function index(){
    $this->paramError();
  }
}