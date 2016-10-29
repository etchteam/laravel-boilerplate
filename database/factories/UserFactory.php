<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $faker->password,
        'remember_token' => str_random(10),
    ];
});
