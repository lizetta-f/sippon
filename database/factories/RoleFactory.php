<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        // 'user_id' => factory(User::class)->create()->id,
        // 'title'   => $faker->sentence(3, false),
        // 'content' => $faker->sentences(3, true),
    ];
});
