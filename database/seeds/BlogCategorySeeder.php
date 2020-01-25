<?php

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//php artisan db:seed --class=BlogCategorySeeder
	    factory( \App\Models\Blog\BlogCategory::class, 6 )->create();
	    $this->command->info( 'BlogCategory complete ...' );
    }
}
