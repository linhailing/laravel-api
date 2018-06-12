<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Tools\Util;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
        @define('TIMESTAMP', time());
        @define('DATETIME', date('Y-m-d H:i:s', TIMESTAMP));
    }
    public function req($key, $val = null){
        if(isset($_REQUEST[$key])) return Util::saddslashes(@$_REQUEST[$key]);
        return $val;
    }
    protected function jsonp($data, $callback = 'callback'){
        Util::jsonp($data, $callback);
    }
}
