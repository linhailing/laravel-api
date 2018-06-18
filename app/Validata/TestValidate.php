<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2018/6/18
 * Time: 下午9:40
 */

namespace App\Validata;


class TestValidate extends BaseValidata
{
    public function check($request){
        $rules = [
            'name' => 'required',
        ];
        $this->goCheck($request,$rules);
    }

}