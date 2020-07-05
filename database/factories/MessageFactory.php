<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Message;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'title'   => $faker->sentence(3, false),
        'content' => $faker->sentences(3, true),
        // "updated_at" => Carbon::now()->timestamp,
        // "created_at" => Carbon::now()->timestamp
    ];
});
