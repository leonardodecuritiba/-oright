<?php

use Faker\Generator as Faker;
use \App\Models\Clients\Client;
use \App\Models\Users\User;

$factory->defineAs( Client::class, 'natural', function ( Faker $faker ) {
	$user = factory( User::class )->create();
	$user->attachRole( 2 );
	$finished = 1;
	return [
		'user_id'    => function () use ( $user ) {
			return $user->id;
		},
		'address_id' => function () {
			return factory( \App\Models\Commons\Address::class )->create()->id;
		},
		'contact_id' => function () {
			return factory( \App\Models\Commons\Contact::class )->create()->id;
		},
		'private_key'=> \App\Helpers\DataHelper::NewGuid(),
		'type'       => 0,
		'birthday'   => $faker->date( $format = 'd/m/Y', $max = 'now' ),
		'cpf'        => $faker->cpf( false ),
		'rg'         => $faker->rg( false ),
		'name'       => $faker->name,
	    'finished'       => $finished,
	];
} );

$factory->defineAs( Client::class, 'legal', function ( Faker $faker ) {
	$isention_ie = $faker->boolean();
	$user        = factory( User::class )->create();
	$user->attachRole( 2 );
	$finished = 1;
	return [
		'user_id'      => function () use ( $user ) {
			return $user->id;
		},
		'address_id'   => function () {
			return factory( \App\Models\Commons\Address::class )->create()->id;
		},
		'contact_id'   => function () {
			return factory( \App\Models\Commons\Contact::class )->create()->id;
		},
		'private_key'=> \App\Helpers\DataHelper::NewGuid(),
		'type'         => 1,
		'name'         => $faker->name,
		'cnpj'         => $faker->cnpj( false ),
		'isention_ie'  => $isention_ie,
		'ie'           => ( $isention_ie ) ? null : $faker->randomNumber( $nbDigits = 4 ) . $faker->randomNumber( $nbDigits = 9 ),
		'fantasy_name' => $faker->company,
		'company_name' => $faker->company,
		'foundation'   => $faker->date( $format = 'd/m/Y', $max = 'now' ),
		'finished'       => $finished,
	];
} );