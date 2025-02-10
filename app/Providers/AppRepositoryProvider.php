<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{   

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {   
        $bindings = [
            'User\\UserRepositoryInteface' => 'User\\UserRepository',
            'User\\UserCatalogueRepositoryInteface' => 'User\\UserCatalogueRepository',
            'LanguageRepositoryInteface' => 'LanguageRepository',
        ];

        foreach($bindings as $interface => $implementation) {
            $this->app->bind("App\\Repositories\\Interfaces\\$interface", "App\\Repositories\\$implementation");
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
