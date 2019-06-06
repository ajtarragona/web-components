<?php echo '<?php' ?>

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjtarragonaSetupAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        // Add users username
        if(!Schema::hasColumn('users', 'username')){
            Schema::table('users', function (Blueprint $table) {
                $table->string('username',191)->unique()->nullable();
            });
        }
        // Add users objectguid
        if(!Schema::hasColumn('users', 'objectguid')){
            Schema::table('users', function (Blueprint $table) {
                $table->string('objectguid')->nullable()->after('id');
            });
        }   

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        if(Schema::hasColumn('users', 'username')){
            Schema::table('users', function ($table) {
                $table->dropColumn('username');
            });
        }

        if(Schema::hasColumn('users', 'objectguid')){
            Schema::table('users', function ($table) {
                $table->dropColumn('objectguid');
            });
        }
    }
}


