<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_files', function (Blueprint $table) {
	        $table->increments( 'id' );
	        $table->unsignedInteger( 'work_id' );
	        $table->foreign( 'work_id' )->references( 'id' )->on( 'works' )->onDelete( 'cascade' );
	        $table->string( 'title',100);
	        $table->string( 'descriptions',500);
	        $table->string( 'link',100);
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
        Schema::dropIfExists('work_files');
    }
}
