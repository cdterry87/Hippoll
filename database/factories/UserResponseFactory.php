<?php

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserResponse::class, function (Faker $faker) {
    return [
        'question_id' => rand(1, 4),
        'response_id' => rand(1, 20),
        'ip' => '127.0.0.1',
    ];
});
