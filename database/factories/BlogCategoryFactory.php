<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Blog\BlogCategory::class, function (Faker $faker) {
	$name = $faker->name;
	return [
		'title'        => $name,
		'slug_url'     => \App\Helpers\DataHelper::slugify($name),
		'descriptions' => $faker->text( 100 ),
		'active'       => $faker->boolean()
	];
});
