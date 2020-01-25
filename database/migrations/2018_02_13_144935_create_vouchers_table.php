<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger( 'invoice_id' )->nullable();
            $table->foreign( 'invoice_id' )->references( 'id' )->on( 'invoices' )->onDelete( 'cascade' );

            $table->tinyInteger( 'registers' );
	        $table->tinyInteger( 'due' )->default( 0 );
            $table->string( 'code', 50 );
            $table->string( 'name', 50 );
            $table->decimal( 'value', 10,2 )->default( 0 );
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
        Schema::dropIfExists('vouchers');
    }
}
