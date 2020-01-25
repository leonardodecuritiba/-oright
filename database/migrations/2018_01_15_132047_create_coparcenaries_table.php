<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoparcenariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coparcenaries', function (Blueprint $table) {
	        $table->increments( 'id' );
	        $table->unsignedInteger( 'work_id' );
	        $table->foreign( 'work_id' )->references( 'id' )->on( 'works' )->onDelete( 'cascade' );
	        $table->unsignedInteger( 'user_id' )->nullable();
	        $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
	        $table->string( 'email')->nullable();
	        $table->string( 'name',100)->nullable();
	        $table->string( 'token');
	        $table->dateTime( 'confirmated_at')->nullable();
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
        Schema::dropIfExists('coparcenaries');
    }
}
