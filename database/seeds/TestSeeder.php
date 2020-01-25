<?php

use Illuminate\Database\Seeder;

use \App\Models\Clients\Client;
use \App\Models\Blog\Post;
use \App\Models\Cases\Casex;
use \App\Models\Blog\BlogCategory;
use \App\Models\Blog\Comment;

class TestSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//php artisan db:seed --class=TestSeeder
		Client::flushEventListeners();
		Client::getEventDispatcher();
		Post::flushEventListeners();
		Post::getEventDispatcher();
		Casex::flushEventListeners();
		Casex::getEventDispatcher();

		$start = microtime( true );
		factory( Client::class, 'legal', 10 )->create();
		$this->command->info( 'Client-legal complete ...' );

		factory( Client::class, 'natural', 5 )->create();
		$this->command->info( 'Client-natural complete ...' );

		$client = Client::find(1);
        $client->user->update(['email'=>'client@gmail.com','active'=>1,'verified'=>1]);

		factory( Casex::class, 10 )->create();
		$this->command->info( 'Casex complete ...' );

		factory( BlogCategory::class, 6 )->create();
		$this->command->info( 'BlogCategory complete ...' );

		factory( Post::class, 10 )->create();
		$this->command->info( 'Post complete ...' );

		factory( Comment::class, 200 )->create();
		$this->command->info( 'Comment complete ...' );

//		$this->call( WorkSeeder::class );

		$this->command->info( "*** Importacao IMPORTSEEDER realizada com sucesso em " . round( ( microtime( true ) - $start ), 3 ) . "s ***" );

	}
}
