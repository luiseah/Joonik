<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Response::macro('api', function ($data, $message = null, $extra = [], $status = 200) {
            $attributes = $data instanceof \Illuminate\Pagination\LengthAwarePaginator
                ? [...$data->toArray()]
                : ['data' => $data];

            return \Response::json([
                ...$attributes,
                'message' => $message,
                'status' => 'success',
                ...$extra
            ], $status);
        });

        \Response::macro('success', function ($message, $extra = [], $status = 200) {
            return \Response::json([
                'message' => $message,
                'status' => 'success',
                ...$extra
            ], $status);
        });

        \Response::macro('error', function ($message, $extra = [], $status = 400) {
            return \Response::json([
                'message' => $message,
                'status' => 'success',
                ...$extra
            ], $status);
        });
    }
}