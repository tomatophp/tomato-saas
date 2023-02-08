<?php

namespace Tomatophp\TomatoSaas;

use Illuminate\Support\ServiceProvider;


class TomatoSaasServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \Tomatophp\TomatoSaas\Console\TomatoSaasInstall::class,
        ]);
 
        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-saas.php', 'tomato-saas');
 
        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-saas.php' => config_path('tomato-saas.php'),
        ], 'tomato-saas-config');
 
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
 
        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-saas-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-saas');
 
        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-saas'),
        ], 'tomato-saas-views');
 
        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-saas');
 
        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-saas'),
        ], 'tomato-saas-lang');
 
        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
    }

    public function boot(): void
    {
        //you boot methods here
    }
}
