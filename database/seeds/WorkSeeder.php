<?php

use Illuminate\Database\Seeder;

use \App\Models\Works\Work;
use \App\Models\Works\WorkFile;
use \App\Models\Works\Coparcenary;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    //php artisan db:seed --class=WorkSeeder
	    $start = microtime( true );
	    set_time_limit( 3600 );

	    Work::flushEventListeners();
	    Work::getEventDispatcher();
	    WorkFile::flushEventListeners();
	    WorkFile::getEventDispatcher();
	    Coparcenary::flushEventListeners();
	    Coparcenary::getEventDispatcher();

	    factory( Work::class, 30 )->create();
	    $this->command->info( 'Works complete ...' );

	    factory( WorkFile::class, 20 )->create();
	    $this->command->info( 'WorkFiles complete ...' );

	    factory( Coparcenary::class, 50 )->create();
	    $this->command->info( 'Coparcenary complete ...' );

	    $this->command->info( "*** Importacao IMPORTSEEDER realizada com sucesso em " . round( ( microtime( true ) - $start ), 3 ) . "s ***" );

    }
}
