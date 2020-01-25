<?php

use Faker\Generator as Faker;
use \App\Models\Works\Work;
use \App\Models\Clients\Client;

$factory->define( Work::class, function ( Faker $faker ) {
	$block = $faker->boolean();

	$client = Client::all()->random(1)->first();
//	$destinationPath = public_path(Work::getPath());
//	\File::makeDirectory( $destinationPath, $mode = 0777, true, true );

	return [
		'client_id'             => $client->id,
		'category_id'           => $faker->numberBetween( 1, 6 ),
		'private_key'           => bcrypt($faker->numberBetween( 1, 6 )),
		'pagchain_key'          => $block ? bcrypt($faker->numberBetween( 1, 6 )) : NULL,
		'pagchain_transactionId'=> $block ? bcrypt($faker->numberBetween( 1, 6 )) : NULL,
		'title'                 => $faker->text( 20 ),
//		'cover'                 => $faker->image($dir = $destinationPath, $width = 500, $height = 500, 'technics', false),
		'descriptions'          => $faker->text( 100 ),
		'registered_at'         => $block ? $faker->dateTime() : NULL
	];
} );