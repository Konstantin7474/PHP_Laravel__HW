<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        
        $this->renderable(function (AccessDeniedHttpException $e) {
            return response()->view('errors.403', [
                'message' => $e->getMessage() ?: 'Доступ запрещён'
            ], 403);
        });

        
        $this->renderable(function (NotFoundHttpException $e) {
            return response()->view('errors.404', [], 404);
        });

       
        $this->reportable(function (Throwable $e) {
    
        });
    }
}