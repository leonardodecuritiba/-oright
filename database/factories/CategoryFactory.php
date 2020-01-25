<?php

use Faker\Generator as Faker;
use \App\Models\Works\Category;

$factory->define( Category::class, function ( Faker $faker ) {
	return [
		'title'        => $faker->name,
		'descriptions' => $faker->text( 100 ),
		'active'       => $faker->boolean()
	];
} );