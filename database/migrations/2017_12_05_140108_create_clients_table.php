<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'clients', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'user_id' );
			$table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
			$table->unsignedInteger( 'contact_id' );
			$table->foreign( 'contact_id' )->references( 'id' )->on( 'contacts' )->onDelete( 'cascade' );
			$table->unsignedInteger( 'address_id' );
			$table->foreign( 'address_id' )->references( 'id' )->on( 'addresses' )->onDelete( 'cascade' );

			$table->string( 'private_key', 100 );
			$table->string( 'pagchain_address', 100 )->nullable();
			$table->string( 'pagchain_userId', 100 )->nullable();

			$table->boolean( 'type' )->nullable();
			$table->string( 'cpf', 20 )->nullable();
			$table->string( 'rg', 20 )->nullable();
			$table->string( 'name', 100 )->nullable();
			$table->boolean( 'sex' )->default( 0 );
			$table->date( 'birthday' )->nullable();
			$table->string( 'cnpj', 60 )->nullable();
			$table->string( 'ie', 60 )->nullable();
			$table->boolean( 'isention_ie' )->default( 0 );
			$table->string( 'company_name', 100 )->nullable();
			$table->string( 'fantasy_name', 100 )->nullable();
			$table->date( 'foundation' )->nullable();
			$table->boolean( 'finished' )->default( 0 );
			$table->tinyInteger( 'registers' )->default( 0 );

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
		Schema::dropIfExists( 'clients' );
	}
}
