<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Works\Coparcenary::class, function (Faker $faker) {
	$work = \App\Models\Works\Work::all()->random(1)->first();
	$boolean = $faker->boolean();
	$user_id = NULL;
	$email = NULL;
	$name = NULL;
	if($boolean){
		$user_id = \App\Models\Users\User::all()->random(1)->first()->id;
	} else {
		$email = $faker->unique()->safeEmail;
		$name = $faker->name;
	}
    return [
	    'work_id'           => $work->id,
	    'user_id'           => $user_id,
	    'email'             => $email,
	    'name'              => $name,
	    'token'             => str_random(40),
	    'confirmated_at'   => $faker->dateTime(),
    ];
});
