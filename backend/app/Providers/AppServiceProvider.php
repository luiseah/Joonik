<?php

namespace App\Providers;

use App\Exceptions\AuthenticationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::viaRequest('api_key', function (Request $request) {
            $user = User::where('api_key', $request->header('X-API-KEY'))->first();

            if (!$user) {
                throw new AuthenticationException();
            }

            return $user;
        });
    }
}
