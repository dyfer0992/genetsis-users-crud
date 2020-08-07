<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\Domain\Users\User::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'surname'     => $faker->lastName,
        'address'     => $faker->address,
        'email'       => $faker->unique()->safeEmail,
        'province_id' => \App\Domain\Users\Province::first()->id_provincia,
        'gender'      => $faker->randomElement(\App\Domain\Users\User::GENDERS),
    ];
});
