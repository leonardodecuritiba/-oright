<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
	        $table->increments( 'id' );
	        $table->unsignedInteger( 'creator_id' );
	        $table->foreign( 'creator_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
	        $table->unsignedInteger( 'category_id' );
	        $table->foreign( 'category_id' )->references( 'id' )->on( 'blog_categories' )->onDelete( 'cascade' );

	        $table->string( 'short_image', 100 );
	        $table->string( 'title', 100 )->unique();
	        $table->string( 'slug_url', 100 );
	        $table->string( 'short_content', 500 );
	        $table->mediumText( 'content' );
	        $table->boolean( 'active' )->default( 0 );
	        $table->unsignedInteger( 'visualizations' )->default( 0 );

	        $table->dateTime('published_at')->nullable();

	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
