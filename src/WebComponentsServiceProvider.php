<?php

namespace Ajtarragona\WebComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Ajtarragona\WebComponents\DirectivesRepository;


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
        
        Blade::component('ajtarragona-web-components::bootstrap.row', 'row');
        Blade::component('ajtarragona-web-components::bootstrap.col', 'col');

        Blade::component('ajtarragona-web-components::bootstrap.alert', 'alert');
        Blade::component('ajtarragona-web-components::bootstrap.badge', 'badge');
        Blade::component('ajtarragona-web-components::bootstrap.card', 'card');
        //Blade::component('ajtarragona-web-components::bootstrap.breadcrumb', 'breadcrumb');
        Blade::component('ajtarragona-web-components::bootstrap.list-group', 'listgroup');
        Blade::component('ajtarragona-web-components::bootstrap.table', 'table');
        Blade::component('ajtarragona-web-components::bootstrap.tabs', 'tabs');
        Blade::component('ajtarragona-web-components::bootstrap.tab', 'tab');
        Blade::component('ajtarragona-web-components::bootstrap.tabcontent', 'tabcontent');
        Blade::component('ajtarragona-web-components::bootstrap.tabpane', 'tabpane');
        Blade::component('ajtarragona-web-components::bootstrap.list', 'list');
        Blade::component('ajtarragona-web-components::bootstrap.listitem', 'li');
        Blade::component('ajtarragona-web-components::bootstrap.forms.form', 'form');
        Blade::component('ajtarragona-web-components::bootstrap.forms.button', 'button');
        
        
        Blade::component('ajtarragona-web-components::bootstrap.forms.formgroup', 'formgroup');
        Blade::component('ajtarragona-web-components::bootstrap.forms.inputgroup', 'inputgroup');
        Blade::component('ajtarragona-web-components::bootstrap.forms.buttongroup', 'buttongroup');
        
        Blade::component('ajtarragona-web-components::bootstrap.code', 'code');
        Blade::component('ajtarragona-web-components::bootstrap.block', 'block');
    }
}
