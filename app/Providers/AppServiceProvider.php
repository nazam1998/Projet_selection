<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
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
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        Carbon::setLocale(config('app.locale'));

        if (App::environment('prod')) {
            $this->app->bind('path.public', function () {
                return base_path('../../public_html');
            });
        }
    }
}
