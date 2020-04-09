<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Activities;
use Faker\Generator as Faker;

$factory->define(Activities::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'amount' => $faker->word,
        'percent' => $faker->word,
        'total' => $faker->word,
        'activity_type_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
