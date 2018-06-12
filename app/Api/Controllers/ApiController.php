<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller{
  public function index(){
    return "api/welcome/index";
  }
}