<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app('validator')->extend('case', function ($attribute, $value, $parameters) {
            switch ($parameters[0]) {
                case 'uppercase':
                    return preg_match('/[A-Z]/', $value) && !preg_match('/[a-z]/', $value);
                    break;
                case 'lowercase':
                    return !preg_match('/[A-Z]/', $value) && preg_match('/[a-z]/', $value);
                    break;
                case 'mixed':
                    return preg_match('/[A-Z]/', $value) && preg_match('/[a-z]/', $value);
                    break;
                default:
                    return true;
                    break;
            }
        });

        app('validator')->extend('numbers', function ($attribute, $value, $parameters) {
            $n = empty($parameters) ? 1 : $parameters[0];
            preg_match_all('/[\d]{1}/', $value, $matches);
            return (count($matches[0]) >= $n);
        });

        app('validator')->extend('letters', function ($attribute, $value, $parameters) {
            $n = empty($parameters) ? 1 : $parameters[0];
            preg_match_all('/[A-z]{1}/', $value, $matches);
            return (count($matches[0]) >= $n);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
