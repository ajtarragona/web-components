<?php

namespace Ajtarragona\WebComponents\Commands;

use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use \Artisan;
use \Exception;


class SetupAuth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ajtarragona:setupauth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Auth User table';

    protected $migrationSuffix = 'ajtarragona_setup_auth';

    

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
        try{

        	$this->laravel->view->addNamespace('ajtarragona-web-components', substr(__DIR__, 0, -8).'views');
	        $this->line('');
	        $this->info("TGN Auth setup.");
	        
	        $existingMigrations = $this->alreadyExistingMigrations();
	        $defaultAnswer = true;

	        if ($existingMigrations) {
	            $this->line('');

	            $this->warn($this->getExistingMigrationsWarning($existingMigrations));

	            $defaultAnswer = false;
	        }

	        $this->line('');

	        if ($this->confirm("Proceed with the migration creation?", $defaultAnswer)) {
	            $this->line("Creating migration...");

                if ($this->createMigration()) {
                    $this->info("Migration created successfully.");
                    if ($this->confirm("Do you want run the migration?",true)) {
                        $this->runMigration();
                    }
                } else {
                    $this->error(
                        "Couldn't create migration.\n".
                        "Check the write permissions within the database/migrations directory."
                    );
                }
                    
            }
            

            if(!$this->alreadyExistingUser()){
                if($this->confirm("Create a default user?", true)) {
                    $this->createUser();
                    $this->info("User 'user' with password 'user' created successfully.");
                    
                }
            }
	            
        $this->line('');


           

        }catch(Exception $e){
            $this->error('Error setting up auth');
           // dd($e);
            $this->error($e->getMessage());
        }

    }




	


	protected function runMigration(){
        $exitcode=Artisan::call('migrate');
        return true;
        
	}


    protected function alreadyExistingUser()
    {
        if(Schema::hasTable('users')){
           return DB::table('users')->where('username', 'user')->count() > 0;
        }
        return false;
    }


    protected function createUser(){

        if(!$this->alreadyExistingUser()){
            
            $this->line("Creating user...");

            if(Schema::hasTable('users')){

                DB::table('users')->insert([
                    'username' => 'user', 
                    'email' => 'user@tarragona.cat', 
                    'name' => 'Basic user',
                    'password' => bcrypt('user'),
                    'created_at' => _now(),
                    'updated_at' => _now()
                ]);
            }

        }
    }

    /**
     * Create the migration.
     *
     * @return bool
     */
    protected function createMigration()
    {
        $migrationPath = $this->getMigrationPath();
		
        $output = $this->laravel->view
            ->make('ajtarragona-web-components::usermigration')
            ->render();

        if (!file_exists($migrationPath) && $fs = fopen($migrationPath, 'x')) {
            fwrite($fs, $output);
            fclose($fs);
            return true;
        }

        return false;
    }



   

    /**
     * Build a warning regarding possible duplication
     * due to already existing migrations.
     *
     * @param  array  $existingMigrations
     * @return string
     */
    protected function getExistingMigrationsWarning(array $existingMigrations)
    {
        if (count($existingMigrations) > 1) {
            $base = "Auth user migrations already exist.\nFollowing files were found: ";
        } else {
            $base = "Auth user migration already exists.\nFollowing file was found: ";
        }

        return $base . array_reduce($existingMigrations, function ($carry, $fileName) {
            return $carry . "\n - " . $fileName;
        });
    }

    /**
     * Check if there is another migration
     * with the same suffix.
     *
     * @return array
     */
    protected function alreadyExistingMigrations()
    {
        $matchingFiles = glob($this->getMigrationPath('*'));

        return array_map(function ($path) {
            return basename($path);
        }, $matchingFiles);
    }

    /**
     * Get the migration path.
     *
     * The date parameter is optional for ability
     * to provide a custom value or a wildcard.
     *
     * @param  string|null  $date
     * @return string
     */
    protected function getMigrationPath($date = null)
    {
        $date = $date ?: date('Y_m_d_His');

        return database_path("migrations/${date}_{$this->migrationSuffix}.php");
    }
}
