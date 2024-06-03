<?php

    use Illuminate\Foundation\Application;
    use Illuminate\Foundation\Configuration\Exceptions;
    use Illuminate\Foundation\Configuration\Middleware;
    use Illuminate\Http\Request;
    use App\Facades\Response;

    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__ . '/../routes/web.php',
            api: __DIR__ . '/../routes/api.php',
            commands: __DIR__ . '/../routes/console.php',
            health: '/up',
        )
        ->withMiddleware(function (Middleware $middleware) {
            //
        })
        ->withExceptions(function (Exceptions $exceptions) {

//            $exceptions->render(function (Exception $e, Request $request){
//                if ($request->is('api/*')) {
//
//                   return  Response::error(
//                        $e->getMessage(),
//                        [],
//                        \App\Enums\Status::ERROR->value,
//                        \App\Enums\StatusCode::BAD_REQUEST->value,
//                    );
//
//
//                }
//            });
            \App\Exceptions\Auth\AuthException::exception($exceptions);
        })->create();
