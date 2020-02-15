<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    // rather than creating users, staff members and services here, use those that have already been seeded
    // by using a random number in the range of the number of rows we've seeded
    return [
        'staff_member_id' => rand(1,10),
        'customer_id' => rand(1,50),
        'service_id' => rand(1,5),
        'date' => $faker->dateTimeBetween('now', '+30 days')
    ];
});
