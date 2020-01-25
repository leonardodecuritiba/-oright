<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string( 'code', 8 )->index();
	        $table->string( 'name', 65 );
	        $table->string( 'description', 65 );
	        $table->unsignedInteger( 'amount' )->default(0);
	        $table->unsignedInteger( 'setup_fee' )->default(0);

	        $table->string( 'interval', 100 );//unit,length
	        $table->unsignedInteger( 'billing_cycles');

	        $table->string( 'trial', 100 );//days,enabled,hold_setup_fee

            $table->string('payment_method', 11)->default('ALL');
	        $table->string( 'options', 200 );
	        $table->tinyInteger( 'registers');

	        $table->string( 'status', 8 );
	        $table->boolean( 'active' )->default( 1 );
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
        Schema::dropIfExists('plans');
    }
}
