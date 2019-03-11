<?php echo '<?php' ?>

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjtarragonaWebComponentsDemo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// Create table for storing types
        Schema::create('{{ $types_table }}', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
        });

        // Create table for storing items
        Schema::create('{{ $items_table  }}', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('number');
            $table->unsignedInteger('type_id');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('{{ $types_table }}')->onUpdate('cascade')->onDelete('cascade');
        });

       

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('{{ $items_table  }}');
        Schema::dropIfExists('{{ $types_table  }}');
       
    }
}
