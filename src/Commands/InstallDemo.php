<?php

namespace Ajtarragona\WebComponents\Commands;

use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use \Artisan;
use \Exception;


class InstallDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ajtarragona:installdemo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install package Demo';

    protected $migrationSuffix = 'ajtarragona_webcomponents_demo';

    

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
	        $this->info("TGN Web Components Demo Migration Creation.");
	        $this->line('');
	        $this->comment($this->generateMigrationMessage());

	        $existingMigrations = $this->alreadyExistingMigrations();
	        $defaultAnswer = true;

	        if ($existingMigrations) {
	            $this->line('');

	            $this->warn($this->getExistingMigrationsWarning($existingMigrations));

	            $defaultAnswer = false;
	        }

	        $this->line('');

	        if (! $this->confirm("Proceed with the migration creation?", $defaultAnswer)) {
	            return;
	        }

	        //$this->line('');

            

            $this->createAdminUser();

	        $this->line("Creating migration...");

	        if ($this->createMigration()) {
	            $this->info("Migration created successfully.");
	            
	            if ($this->confirm("Do you want to create the database?", !$this->alreadyExistingTables() )) {
	            	if($this->createDatabase()){
	            		$this->info("Database created!");
        	    	}else{
        	    		$this->error("Demo tables already exist.");
        	    	}
	            }

	            if ($this->confirm("Do you want to seed the database?", $this->alreadyExistingTables())) {
		        	if($this->seedDatabase()){
		        		$this->info("Database seeded successfully!");

		        	}else{
		        		 $this->error("Couldn't seed the database.");
		        	}
		    	}

	        } else {
	            $this->error(
	                "Couldn't create migration.\n".
	                "Check the write permissions within the database/migrations directory."
	            );
	        }

	        $this->line('');
           

        }catch(Exception $e){
            $this->error('Error installing demo');
           // dd($e);
            $this->error($e->getMessage());
        }

    }




	protected function getItemsTableName(){
		$config=config('webcomponents');
		return $config['demo']['tables_prefix'] ."_". $config['demo']['tables']['items'];
	}

	protected function getTypesTableName(){
		$config=config('webcomponents');
		return $config['demo']['tables_prefix'] ."_". $config['demo']['tables']['types'];
	}



	protected function createDatabase(){
        if(!$this->alreadyExistingTables()){
            $this->line("Running artisan migrate...");
            $exitcode=Artisan::call('migrate');
            return true;
            
        }else{
        	
        	return false;

        }
	}

    protected function createAdminUser(){

        if(!$this->alreadyExistingUser()){
            
            $this->line("Creating demo user...");

            if(Schema::hasTable('users')){

                DB::table('users')->insert([
                    'username' => 'demo', 
                    'email' => 'demo@tarragona.cat', 
                    'name' => 'Demo user',
                    'password' => bcrypt('demo'),
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
		$items_table=$this->getItemsTableName();
		$types_table=$this->getTypesTableName();

        $output = $this->laravel->view
            ->make('ajtarragona-web-components::demo.migration')
            ->with(['items_table' => $items_table, 'types_table'=>$types_table])
            ->render();

        if (!file_exists($migrationPath) && $fs = fopen($migrationPath, 'x')) {
            fwrite($fs, $output);
            fclose($fs);
            return true;
        }

        return false;
    }



	protected function seedDatabase(){
		$faker = FakerFactory::create();
      
		$items_table=$this->getItemsTableName();
		$types_table=$this->getTypesTableName();

		try{
			if(!Schema::hasTable($types_table)){
				$this->line('');
	       		$this->error("Types table doesn't exist");
				$this->line('');
	        	return false;
			}

			if(!Schema::hasTable($items_table)){
				$this->line('');
	       		$this->error("Items table doesn't exist");
				$this->line('');
	        	return false;
			}

			DB::beginTransaction();

			$this->line('Truncating tables...');
			DB::statement("SET foreign_key_checks=0");
			DB::table($items_table)->truncate();
		 	DB::table($types_table)->truncate();
			DB::statement("SET foreign_key_checks=1");

			$this->line('Seeding types...');
           
			$numtypes=10;
	        $bar = $this->output->createProgressBar($numtypes);
	        $bar->start();

	        for($i=0;$i<$numtypes;$i++){
				DB::table($types_table)->insert(
				    [
				    	'name' => $faker->word, 
				    	'description' => $faker->sentence
				    ]
				);
			    $bar->advance();
	        }

	        $bar->finish();

	        $this->line('');

			
			
			$this->line('Seeding items...');
			
			$numitems=100;
			$bar = $this->output->createProgressBar($numtypes);
	        $bar->start();
	        for($i=0;$i<$numitems;$i++){
				DB::table($items_table)->insert(
				    [
				    	'name' => $faker->word, 
				    	'description' => $faker->sentence,
				    	'number' => $faker->numberBetween(1,20),
				    	'type_id' => $faker->numberBetween(1,$numtypes),
				    	'created_at' => date('Y-m-d H:i:s')
					]
				);
				$bar->advance();
			}
			$bar->finish();

	        $this->line('');
	        DB::commit();
	        return true;

	    }catch (Exception $e){
	        DB::rollBack();
	        $this->line('');
	        $this->error($e->getMessage());
	        $this->line('');
	        return false;
	    }
	}  

    /**
     * Generate the message to display when running the
     * console command showing what tables are going
     * to be created.
     *
     * @return string
     */
    protected function generateMigrationMessage()
    {
        $tables = collect(config('webcomponents.demo.tables'));

        return "A migration that creates {$tables->implode(', ')} "
            . "tables will be created in database/migrations directory";
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
            $base = "Demo migrations already exist.\nFollowing files were found: ";
        } else {
            $base = "Demo migration already exists.\nFollowing file was found: ";
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

    protected function alreadyExistingUser()
    {
        if(Schema::hasTable('users')){
           return DB::table('users')->where('username', 'demo')->count() > 0;
        }
        return false;
    }

    protected function alreadyExistingTables()
    {
        return Schema::hasTable($this->getItemsTableName()) || Schema::hasTable($this->getTypesTableName());
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
