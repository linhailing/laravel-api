<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2018/6/18
 * Time: 下午9:05
 */

namespace App\Validata;

use Validator;
use App\Exceptions\ApiException;

class BaseValidata
{
    public  function  goCheck($request,$rules){
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()){
            throw new ApiException($validate->errors());
        }else{
            return true;
        }

    }
}