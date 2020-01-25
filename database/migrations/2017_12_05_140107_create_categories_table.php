<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'categories', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'title', 100 )->unique();
			$table->string( 'descriptions', 100 );
			$table->boolean( 'active' )->default( 1 );
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
		Schema::dropIfExists( 'categories' );
	}
}
