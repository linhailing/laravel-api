<?php
namespace App\Admin\Controllers;

class WelcomeController extends AdminController{
  public function index(){
    return view('admin.welcome.index');
  }
  public function test(){
    return view('admin.welcome.test');
  }
}