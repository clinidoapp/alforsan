<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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
            Schema::defaultStringLength(191);

            view()->composer('*', function ($view) {
        $locale = Session::get('locale', 'ar');
        App::setLocale($locale);
        $view->with('current_locale', $locale);
    });
        }
}
