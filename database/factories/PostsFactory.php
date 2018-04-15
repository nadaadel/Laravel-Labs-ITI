<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'title' => substr($faker->sentence(2), 0, -1),
        'body' => $faker->paragraph,
        'user_id'=> 1
    ];
});
