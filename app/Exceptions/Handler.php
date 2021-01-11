<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;
use \App\Exceptions\BusinessLogicException;
use \App\Exceptions\DatabaseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function register()
    {
        //
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json(["error" => "1", "error_message" => $exception->errors()]);
        } elseif ($exception instanceof DatabaseException) {
            return response()->json(["error" => "2", "error_message" => $exception->errors()]);
        } elseif ($exception instanceof BusinessLogicException) {
            return response()->json(["error" => "3", "error_message" => $exception->errors()]);
        } elseif ($exception instanceof NotFoundHttpException) {
            return redirect('/pagenotfound');
        } else {
            return response()->json(["error" => "4", "error_message" => $exception->getMessage()]);
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
        ? response()->json(['message' => $exception->getMessage()], 401)
        : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
