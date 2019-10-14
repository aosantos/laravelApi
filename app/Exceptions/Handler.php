<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        //
    ];


    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function report(Exception $exception)
    {
        parent::report($exception);
    }


    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            if ($request->expectsJson())
                return response()->json(['error' => 'Not_found_URI'], $exception->getStatusCode());
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            if ($request->expectsJson())
                return response()->json(['error' => 'Method_Not_Allowed'], $exception->getStatusCode());
        }

        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            return response()->json(['token_expired'], $exception->getStatusCode());

        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            return response()->json(['token_invalid'], $exception->getStatusCode());

        return parent::render($request, $exception);
    }
}
