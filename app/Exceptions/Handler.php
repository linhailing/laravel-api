<?php

namespace App\Exceptions;

use App\Tools\Util;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //return parent::render($request, $exception);
        /**
        if (config('app.debug')){

        }*/
        if ($exception instanceof ApiException){
            return $this->handle($request, $exception);
        }
        return parent::render($request, $exception);

    }
    public function handle($request, Exception $e){
        if ($e instanceof ApiException){
            $ret = [
                'ret' => 404,
                'msg' => '参数错误！',
                'code' => 404,
            ];
            return Util::jsonp($ret);
        }
        return parent::render($request, $e);
    }
}
