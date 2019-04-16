<?php

namespace Ajtarragona\WebComponents\Commands;

use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use \Artisan;
use \Exception;


class PrepareJs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ajtarragona:prepare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare Javascript and CSS resources';
    protected $routes_filename = 'routes';
    protected $messages_filename = 'messages';


    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $resources_path = public_path('vendor/ajtarragona/js');
        
       	$this->line("Exporting routes ...");
        Artisan::call('laroute:generate',['-p'=>$resources_path,'-f'=>$this->routes_filename]);
        

        $this->line("Exporting localization strings ...");
        Artisan::call('vendor:publish',['--tag'=>'ajtarragona-web-components-translations','--force'=>true]);
        Artisan::call('lang:js',['-c'=>false,'target'=>$resources_path.'/'.$this->messages_filename.'.js']);
  

        $this->line("Publishing assets ...");
        Artisan::call('vendor:publish',['--tag'=>'ajtarragona-web-components-assets','--force'=>true]);
        

        
        
        
    }



}
