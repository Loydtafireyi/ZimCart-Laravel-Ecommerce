<?php

namespace App\Providers;

use App\SystemSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        View::share('shareSettings', SystemSetting::first());

        Schema::defaultStringLength(191);
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
