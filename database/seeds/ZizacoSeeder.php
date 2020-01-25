<?php

use Illuminate\Database\Seeder;
use \App\Models\Users\User;
use \App\Models\Users\Collaborator;
use \App\Models\Users\Role;

class ZizacoSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//['manager','coordenator','buyer','financial']
		//php artisan db:seed --class=ZizacoSeeder
		$start = microtime( true );
		$this->command->info( 'Iniciando os Seeders ZizacoSeeder' );
		$this->command->info( 'SETANDO Administrador' );
		$admin               = new Role(); // Gerência = tudo
		$admin->name         = 'admin';
		$admin->display_name = 'Administrador'; // optional
		$admin->description  = 'Usuário com acesso total ao sistema'; // optional
		$admin->save();

		$this->command->info( 'SETANDO Cliente' );
		$client               = new Role();
		$client->name         = 'client'; //Preenchimento de requisição + cadastro de clientes
		$client->display_name = 'Cliente'; // optional
		$client->description  = 'Usuário com acessos restritos'; // optional
		$client->save();

		echo "\n*** Completo em " . round( ( microtime( true ) - $start ), 3 ) . "s ***";
	}
}
