<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $number = 1;
    return [
        'body' => $faker->text(200),
        'post_id' => $number

    ];
});
