<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StaffMember;
use Faker\Generator as Faker;

$factory->define(StaffMember::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'firstname' => $faker->firstName,
        'lastname' => $faker->firstName,
    ];
});
