<?php

use Faker\Generator as Faker;
use \App\Models\Clients\Client;
use \App\Models\Clients\ClientPlan;
use \App\Models\Plans\Plan;
$factory->define(ClientPlan::class, function (Faker $faker) {
	$active = $faker->boolean();
	$clients_id = ClientPlan::all()->pluck('client_id');
	$client = Client::whereNotIn('id',$clients_id)->get()->random(1)->first();
	$plan = Plan::all()->random(1)->first();
    return [
	    'client_id'    => $client->id,
	    'plan_id'      => $plan->id,
	    'value'        => $plan->value,
	    'active'       => $active,
	    'activated_at' => $active ? $faker->dateTime : NULL
    ];
});