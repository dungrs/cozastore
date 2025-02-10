<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $binding = [
            'User\\UserServiceInterface' => 'User\\UserService',
            'User\\UserCatalogueServiceInterface' => 'User\\UserCatalogueService',
            'LanguageServiceInterface' => 'LanguageService',
        ];

        foreach($binding as $interface => $implementation) {
            $this->app->bind("App\\Services\\Interfaces\\$interface", "App\\Services\\$implementation");
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
