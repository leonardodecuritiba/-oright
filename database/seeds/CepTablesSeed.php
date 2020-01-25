<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CepTablesSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//php artisan db:seed --class=CepTablesSeed
		DB::unprepared( DB::raw( file_get_contents( storage_path( 'import' ) . DIRECTORY_SEPARATOR . 'cep-states-cities.sql' ) ) );
	}
}
