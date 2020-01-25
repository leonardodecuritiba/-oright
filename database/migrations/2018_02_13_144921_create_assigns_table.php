<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->increments('id');
	        $table->string( 'code', 8 )->index();
	        $table->unsignedInteger( 'client_id' );
	        $table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'cascade' );

	        $table->unsignedInteger( 'plan_id' );
	        $table->foreign( 'plan_id' )->references( 'id' )->on( 'plans' )->onDelete( 'cascade' );

	        $table->tinyInteger( 'registers');
	        $table->unsignedInteger( 'amount' );

	        $table->string( 'status', 10 )->nullable();

	        $table->date( 'expiration_date')->nullable();
	        $table->date( 'next_invoice_date')->nullable();

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
        Schema::dropIfExists('assigns');
    }
}
