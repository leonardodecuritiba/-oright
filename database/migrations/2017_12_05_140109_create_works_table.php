<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'works', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'client_id' );
			$table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'cascade' );
			$table->unsignedInteger( 'category_id' );
			$table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'cascade' );
			$table->string( 'title', 200 );
			$table->string( 'private_key', 100 );
			$table->string( 'pagchain_key', 200 )->nullable();
			$table->string( 'pagchain_transactionId', 200 )->nullable();
			$table->string( 'descriptions', 500 );
			$table->string( 'cover',100)->nullable();
			$table->dateTime( 'registered_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		} );


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'works' );
	}
}
