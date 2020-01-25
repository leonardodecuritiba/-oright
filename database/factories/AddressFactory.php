<?php

use Faker\Generator as Faker;

$factory->define( App\Models\Commons\Address::class, function ( Faker $faker ) {
	$state_id = $faker->numberBetween( $min = 1, $max = 20 );
	$city     = \App\Models\Commons\CepCities::findOrFailByStateId( $state_id )->random( 1 )->first();
	return [
		'state_id'   => $state_id,
		'city_id'    => $city->id,
		'zip'        => $faker->randomNumber( $nbDigits = 8 ),
		'district'   => $faker->streetName,
		'street'     => $faker->streetName,
		'number'     => $faker->randomNumber( $nbDigits = 4 ),
		'complement' => $faker->word
	];
} );
