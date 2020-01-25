<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Blog\Comment::class, function (Faker $faker) {
	$post = \App\Models\Blog\Post::all()->random(1)->first();
    return [
	    'user_id'      => $faker->numberBetween( 1, 6 ),
	    'post_id'      => $post->id,
	    'content'      => $faker->text( 200 ),
	    'active'       => $faker->boolean()
    ];
});
