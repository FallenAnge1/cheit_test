<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('json_string', function ($attribute, $value, $parameters, $validator) {
            if (!is_string($value)){
                return false;
            }
            json_decode($value);
            return (json_last_error() == JSON_ERROR_NONE);
        }, 'The :attribute must be a valid json string.');
    }
}
