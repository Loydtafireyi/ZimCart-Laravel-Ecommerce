<?php

namespace App\Providers;

use App\SystemSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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

        try {
            \DB::connection()->getPdo();
            Schema::defaultStringLength(191);

            if(\DB::connection()->getDatabaseName()){
                if(Schema::hasTable('system_settings')){
                    View::share('shareSettings', Cache::rememberForever('shareSettings', function() {
                        return SystemSetting::first();
                    }));
                };
            }
        }catch(\Exception $ex){

          return redirect(route('LaravelInstaller::environment'));
        }

        // Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
