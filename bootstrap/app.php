<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })

    ->withExceptions(function ($exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            // Obtém o código de status da exceção
            $statusCode = $e->getStatusCode(); // 404, no caso do NotFoundHttpException
            // dd($statusCode); //função para debugar uma linha/variavel
            
            // Constrói o caminho da view de forma dinâmica
            return response()->view("errors.{$statusCode}", [], $statusCode);
        });
    })->create();
