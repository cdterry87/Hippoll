<?php

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(App\UserResponse::class, function (Faker $faker) {

    $question_id = rand(1, 4);
    $response_id = DB::table('responses')->where('question_id', $question_id)->inRandomOrder()->first()->id;

    return [
        'question_id' => $question_id,
        'response_id' => $response_id,
        'ip' => '127.0.0.1',
    ];
});
