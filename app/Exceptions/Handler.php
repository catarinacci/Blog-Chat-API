<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        $this->renderable(function (RouteNotFoundException $e, $request) {

            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'unauthenticated'
                ], 404);
            }
        });
        $this->renderable(function (HttpException $e, $request) {

            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Your email address is not verified.'
                ], 404);
            }
        });
    }
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'messaje' => __('Los datos proporcionados no son válidos'),
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}
