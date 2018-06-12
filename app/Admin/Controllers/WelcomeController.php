<?php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller{
  public function index(){
    return "admin/welcome/index";
  }
}