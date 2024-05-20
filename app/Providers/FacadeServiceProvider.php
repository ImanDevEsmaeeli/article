<?php

namespace App\Providers;

use App\Facades\Response;
use Illuminate\Support\ServiceProvider;
use App\Utils\Response\Response as UtilsResponse;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Response::run(UtilsResponse::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
