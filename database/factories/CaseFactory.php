<?php

use Faker\Generator as Faker;
use \App\Models\Cases\Casex;

$factory->define( Casex::class, function ( Faker $faker ) {
	$active = $faker->boolean();
	$destinationPath = public_path(Casex::getPath());
	\File::makeDirectory( $destinationPath, $mode = 0777, true, true );

	return [
		'cover'     => $faker->image($dir = $destinationPath, $width = 500, $height = 500, 'people', false),
		'name'      => $faker->name,
		'function'  => $faker->word,
		'content'   => $faker->text( 500 ),
		'active'    => $active
	];
} );