<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Custom response factory
        ResponseFactory::macro('error', function ($message, $status = 400) {
            return response()->json([
                'status_code'   => $status,
                'message'       => $message,
            ], $status);
        });

        ResponseFactory::macro('ok', function ($data = [], $status = 200) {
            return response()->json([
                'status_code'   => $status,
                'data'          => $data,
            ], $status);
        });
    }
}
