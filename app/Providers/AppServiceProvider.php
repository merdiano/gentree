<?php

namespace App\Providers;

use App\Facades\GentreeFacade;
use App\Gentree;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('gentree', GentreeFacade::class);

        $this->app->singleton('gentree', function () {
            return new Gentree();
        });
    }
}
