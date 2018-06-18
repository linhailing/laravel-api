<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2018/6/18
 * Time: 下午10:12
 */

namespace App\Exceptions;

class ApiException extends \Exception
{
    public function __construct($msg='')
    {
        parent::__construct($msg);
    }
}