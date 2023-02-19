<?php

namespace TomatoPHP\TomatoSaas;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Stancl\Tenancy\Events\SyncedResourceChangedInForeignDatabase;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;
use TomatoPHP\TomatoSaas\Menus\DomainMenu;


class TomatoSaasServiceProvider extends ServiceProvider
{
    public function register(): void
    {


        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoSaas\Console\TomatoSaasInstall::class,
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

        TomatoMenuRegister::registerMenu(DomainMenu::class);

        Event::listen(SyncedResourceChangedInForeignDatabase::class, function ($data){
            config(['database.connections.dynamic.database' => $data->tenant->tenancy_db_name]);
            DB::connection('dynamic')
                ->table('users')
                ->where('email', $data->model->email)
                ->update([
                    "name" => $data->model->first_name . ' '. $data->model->last_name,
                    "email" => $data->model->email,
                    "password" => $data->model->password,
                ]);
        });
    }

    public function boot(): void
    {
        //
    }
}
