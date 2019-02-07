<?php

namespace Ajtarragona\WebComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class WebComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     
        //vistas   
        $this->loadViewsFrom(dirname(__DIR__).'/resources/views', 'ajtarragona-web-components');
        
        //cargo rutas
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        //publico vistas
        if ($this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/resources/views' => $this->app->resourcePath('views/vendor/ajtarragona/web-components'),
            ], 'ajtarragona-web-components-views');
        }



        //publico configuracion
        $config = __DIR__.'/Config/webcomponents.php';
        
        $this->publishes([
            $config => config_path('webcomponents.php'),
        ], 'ajtarragona-web-components-config');


        //publico assets
        $this->publishes([
            dirname(__DIR__).'/public' => public_path('vendor/ajtarragona'),
        ], 'ajtarragona-web-components-assets');

        $this->mergeConfigFrom($config, 'webcomponents');


        //directivas
        Blade::directive('dump', function($param) {
            return "<pre><?php (new \Illuminate\Support\Debug\Dumper)->dump({$param}); ?></pre>";
        });

        
        Blade::directive('icon', function($expression) {
            return "<?php echo icon({$expression}); ?>";
        });


        Blade::directive('circleicon', function($expression) {
            return "<?php echo circleicon({$expression}); ?>";
        });


        Blade::directive('input', function($expression) {
            return "<?php echo input({$expression}); ?>";
        });
       
        Blade::directive('textarea', function($expression) {
            return "<?php echo textarea({$expression}); ?>";
        }); 

        Blade::directive('select', function($expression) {
            return "<?php echo select({$expression}); ?>";
        });
        
        Blade::directive('checkbox', function($expression) {
            return "<?php echo checkbox({$expression}); ?>";
        });

        Blade::directive('checkboxes', function($expression) {
            return "<?php echo checkboxes({$expression}); ?>";
        });
       
        Blade::directive('radio', function($expression) {
            return "<?php echo radio({$expression}); ?>";
        });
        Blade::directive('radios', function($expression) {
            return "<?php echo radios({$expression}); ?>";
        });
        


/*
        Blade::directive('navitem', function($expression) {
            return "<?php echo navitem({$expression}); ?>";
        });

        Blade::directive('nav', function($expression) {
            return "<?php echo nav({$expression}); ?>";
        });

        Blade::directive('crumb', function($expression) {
            return "<?php echo crumb({$expression}); ?>";
        });

       
        Blade::directive('pagination', function($expression) {
            return "<?php echo pagination({$expression}); ?>";
        });

        Blade::directive('tablecount', function($expression) {
            return "<?php echo tablecount({$expression}); ?>";
        });
       


        Blade::component('ajtarragona-web-components::bootstrap.row', 'row');
        Blade::component('ajtarragona-web-components::bootstrap.col', 'col');

        Blade::component('ajtarragona-web-components::bootstrap.alert', 'alert');
        Blade::component('ajtarragona-web-components::bootstrap.badge', 'badge');
        Blade::component('ajtarragona-web-components::bootstrap.card', 'card');
        Blade::component('ajtarragona-web-components::bootstrap.breadcrumb', 'breadcrumb');
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
        Blade::component('ajtarragona-web-components::bootstrap.forms.buttongroup', 'buttongroup');*/
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
        
        $this->app->bind('icon', function(){
            return new \Ajtarragona\WebComponents\Models\Icon;
        });


        //helpers
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }
}
