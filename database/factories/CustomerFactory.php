<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name'		=> $faker->name,
		'email'		=> $faker->unique()->safeEmail,
		'address1'	=> str_random(10),
		'address2'	=> str_random(10)
    ];
});
