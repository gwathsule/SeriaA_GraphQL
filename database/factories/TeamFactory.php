<?php

use Illuminate\Support\Str;
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

$factory->define(\App\Team::class, function (Faker $faker) {
    return [
        'technician' => $faker->name,
        'qtd_yellow_cards' => $faker->numberBetween(0, 50),
        'qtd_red_cards' => $faker->numberBetween(0, 50),
        'position' => $faker->unique()->numberBetween(0,20),
        'points' => $faker->numberBetween(0, (38 * 3)),
        'name' => $faker->unique()->city,
        'initials' => strtoupper(Str::random(3)),
        'shield_image' => $faker->url,
    ];
});
