<?php

namespace Ajtarragona\WebComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Ajtarragona\WebComponents\DirectivesRepository;
use Ajtarragona\WebComponents\Commands\InstallDemo;
use Ajtarragona\WebComponents\Commands\PrepareJs;
use Ajtarragona\WebComponents\Commands\SetupAuth;
use Ajtarragona\WebComponents\Livewire\FormTester;
use Livewire\Livewire;


class WebComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     

        //cargo rutas
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        

        //vistas   
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ajtarragona-web-components');
        
        //idiomas
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'tgn');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/ajtarragona-web-components'),
        ], 'ajtarragona-web-components-translations');

        //publico vistas
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => $this->app->resourcePath('views/vendor/ajtarragona/web-components'),
            ], 'ajtarragona-web-components-views');
        }



        //publico configuracion
        $config = __DIR__.'/Config/webcomponents.php';
        
        $this->publishes([
            $config => config_path('webcomponents.php'),
        ], 'ajtarragona-web-components-config');


        //publico assets
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/ajtarragona'),
        ], 'ajtarragona-web-components-assets');

        $this->mergeConfigFrom($config, 'webcomponents');


        $this->registerDirectives();

        $this->registerComponents();
        
        $this->registerCommands();
        Livewire::component('form-tester', FormTester::class);

    }

     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
      

        //defino facades
        $this->app->bind('webcomponent', function(){
            return new \Ajtarragona\WebComponents\Models\WebComponent;
        });
        
        // $this->app->bind('icon', function(){
        //     return new \Ajtarragona\WebComponents\Models\Icon;
        // });


        //helpers
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }


    public function registerDirectives()
    {
        $directives = require __DIR__.'/directives.php';

        DirectivesRepository::register($directives);

    } 


    public function registerComponents()
    {
        
        $components = require __DIR__.'/components.php';
        DirectivesRepository::registerComponents($components);
    }

    public function registerCommands()
    {
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallDemo::class,
                PrepareJs::class,
                SetupAuth::class,
            ]);
        }
    }
}
