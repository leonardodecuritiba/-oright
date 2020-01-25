<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Blog\Post::class, function (Faker $faker) {
	$destinationPath = public_path('uploads' . DIRECTORY_SEPARATOR . 'files'
	                               . DIRECTORY_SEPARATOR . 'blog'
	                               . DIRECTORY_SEPARATOR);
	\File::makeDirectory( $destinationPath, $mode = 0777, true, true );

	$title = $faker->text(100);

	return [
		'creator_id'   => $faker->numberBetween( 1,2 ),
		'category_id'  => $faker->numberBetween( 1, 6 ),
		'visualizations' => $faker->numberBetween( 0, 100),
		'title'        => $title,
		'slug_url'     => \App\Helpers\DataHelper::slugify($title),
		'short_content'=> $faker->text(500),
		'content'      => $faker->randomHtml( 2 ),
		'published_at' => $faker->dateTime(),
		'short_image'  => $faker->image($dir = public_path('uploads/files/blog/'), $width = 640, $height = 480, 'technics', false),
		'active'       => $faker->boolean()
	];
});