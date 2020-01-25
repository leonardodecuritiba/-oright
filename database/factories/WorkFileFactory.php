<?php

use Faker\Generator as Faker;

use App\Models\Works\WorkFile;
use App\Models\Works\Work;
$factory->define(WorkFile::class, function (Faker $faker) {
	$work = Work::all()->random(1)->first();
	$destinationPath = public_path(WorkFile::getPath($work->client_id));
	\File::makeDirectory( $destinationPath, $mode = 0777, true, true );

    return [
    	'work_id'       => $work->id,
	    'title'         => $faker->text(100),
	    'descriptions'  => $faker->text(300),
	    'link'          => $faker->image($dir = $destinationPath, $width = 640, $height = 480, 'technics', false),
    ];
});