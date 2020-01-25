<?php

use Illuminate\Database\Seeder;

use \App\Models\Admins\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::flushEventListeners();
        Admin::getEventDispatcher();

        if(env('APP_ENV') == 'local'){
	        factory( Admin::class, 1 )->create();
	        $this->command->info( 'Admins complete ...' );

	        $admin = Admin::find(1);
	        $admin->update(['name'=>'Leonardo Zanin']);
	        $admin->user->update(['email'=>'silva.zanin@gmail.com','active'=>1,'verified'=>1]);

        } else {
	        factory( Admin::class, 2 )->create();
	        $this->command->info( 'Admins complete ...' );

	        $admin = Admin::find(1);
	        $admin->update(['name'=>'Wendell Toledo']);
	        $admin->user->update(['email'=>'wendell.toledo@artluv.com.br','active'=>1,'verified'=>1]);

	        $admin = Admin::find(2);
	        $admin->update(['name'=>'Leonardo Zanin']);
	        $admin->user->update(['email'=>'silva.zanin@gmail.com','active'=>1,'verified'=>1]);
        }


    }
}
