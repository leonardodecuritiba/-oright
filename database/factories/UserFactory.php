<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define( App\Models\Users\User::class, function ( Faker $faker ) {
    static $password;

    $active = $faker->boolean();
    $verified = $faker->boolean();
    return [
	    'email'          => $faker->unique()->safeEmail,
	    'password'       => $password ?: $password = bcrypt( '123' ),
	    'remember_token' => str_random(10),
	    'verify_token'   => $verified ? str_random(40) : NULL,
	    'verified'       => $verified,
	    'blocked'        => 0,
	    'active'         => $active

    ];
});
