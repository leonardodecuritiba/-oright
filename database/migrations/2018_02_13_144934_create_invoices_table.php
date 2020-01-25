<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

	        $table->unsignedInteger( 'assign_id' );
	        $table->foreign( 'assign_id' )->references( 'id' )->on( 'assigns' )->onDelete( 'cascade' );

	        $table->unsignedInteger( 'amount' )->default( 0 );
	        $table->timestamp( 'paid_at')->nullable();
	        $table->timestamp( 'end_at')->nullable();
	        $table->boolean( 'expired' )->default( 0 );
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
        Schema::dropIfExists('invoices');
    }
}
