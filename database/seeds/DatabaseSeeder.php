<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    set_time_limit( 3600 );
	    $this->call( CepTablesSeed::class );
	    $this->command->info( 'CepTablesSeed complete ...' );
	    $this->call( CategoryTableSeeder::class );
	    $this->command->info( 'CategoryTableSeeder complete ...' );
	    $this->call( PlanTableSeeder::class );
	    $this->command->info( 'PlanTableSeeder complete ...' );
	    $this->call( ZizacoSeeder::class );
	    $this->command->info( 'ZizacoSeeder complete ...' );
	    $this->call( AdminTableSeeder::class );
	    $this->command->info( 'AdminTableSeeder complete ...' );
	    $this->call( ConfigTableSeeder::class );
	    $this->command->info( 'ConfigTableSeeder complete ...' );

	    $destinationPath = public_path(
		    'uploads'
	    );
	    \File::deleteDirectory( $destinationPath );
	    \File::makeDirectory( $destinationPath, $mode = 0777, true, true );

	    $destinationPath = $destinationPath . DIRECTORY_SEPARATOR . 'files';
	    \File::makeDirectory( $destinationPath, $mode = 0777, true, true );

    }
}
