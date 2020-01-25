<?php

use Faker\Generator as Faker;
use \App\Models\Admins\Admin;
use \App\Models\Users\User;

$factory->define( Admin::class, function ( Faker $faker ) {
	$user = factory( User::class )->create();
	$user->attachRole( 1 );
	return [
		'name'       => $faker->name,
		'user_id'    => function () use ( $user ) {
			return $user->id;
		},
	];
} );