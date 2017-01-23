<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data, $message = 'success') {
            return Response::make([
                'code' => 0,
                'message' => $message,
                'data' => $data
            ]);
        });

        Response::macro('fail', function ($message) {
            return Response::make([
                'code' => 1,
                'message' => $message,
                'data' => []
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
