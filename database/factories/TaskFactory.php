<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'task_name' => $faker->text(mt_rand(30, 50)),
        'description' => $faker->text(mt_rand(150, 400)),
        'priority' => $faker->numberBetween(0,500),
        'user_id' => 2,
        'status' => $faker->numberBetween(0,1),
    ];
});
