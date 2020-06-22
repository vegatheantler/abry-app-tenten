<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MessageTemplate;
use Faker\Generator as Faker;

$factory->define(MessageTemplate::class, function (Faker $faker) {
    return [
        'title'         => $faker->unique()->word,
        'created_at'    => $faker->dateTime,
    ];
});
