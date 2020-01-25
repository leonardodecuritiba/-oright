<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger( 'client_id' );
	        $table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'cascade' );

	        $table->unsignedInteger( 'ref_id' );
	        $table->boolean( 'in_out' )->default( 0 ); //0:in - 1:out

	        $table->tinyInteger( 'quantity' );
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
