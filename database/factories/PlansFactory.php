<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Plans\Plans::class, function (Faker $faker) {
	return [
		'title'        => $faker->name,
		'options' => $faker->text( 200 ),
		'value'        => 10,
		'active'       => $faker->boolean()
	];
});