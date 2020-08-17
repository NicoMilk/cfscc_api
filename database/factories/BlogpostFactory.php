<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blogpost;
use Faker\Generator as Faker;

$factory->define(Blogpost::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween($min=1, $max=1),
        'title' => $faker->paragraph($nbSentences=1, $variableNbSentences=true),
        'content' => $faker->paragraph($nbSentences=20, $variableNbSentences=true),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 year', $timezone = null),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
    ];
});
