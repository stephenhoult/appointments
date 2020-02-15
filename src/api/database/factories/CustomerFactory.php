<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'firstname' => $faker->firstName,
        'lastname' => $faker->firstName,
    ];
});
