<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

final class Handler extends ExceptionHandler
{
    /**
     * @var array A list of the exception types that are not reported.
     */
    protected $dontReport = [
        CommandNotFoundException::class,
    ];

    /**
     * @var array A list of the inputs that are never flashed for validation exceptions.
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof NotFoundHttpException) {
            return response()
                ->json(['message' => $e->getMessage() ?: 'Метод не определен. Пожалуйста, проверьте URL'], $e->getStatusCode());
        }

        return parent::render($request, $e);
    }

    /**
     * @param  Request  $request
     */
    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse
    {
        return response()
            ->json(['message' => $exception->getMessage()], 401);
    }

    /**
     * @param  Request  $request
     */
    protected function invalidJson($request, LaravelValidationException $exception): JsonResponse
    {
        $errors = $exception->errors();
        $message = $exception->validator->errors()->first()
            ?: $exception->getMessage();

        return response()
            ->json(compact('message', 'errors'), $exception->status);
    }
}
