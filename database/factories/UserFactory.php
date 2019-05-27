<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'), // password
        'remember_token' => Str::random(10),
    ];
});

/**
 * Состояние для учетной записи ведущего программиста
 */
$factory->state(User::class, 'senior', [
      'name' => 'senior',
      'email' => 'senior@test.ru',
      'password' => bcrypt('password'),
      'role' => 'senior',
]);

/**
 * Состояние для учетной записи рядового программиста
 */
$factory->state(User::class, 'junior', [
      'name' => 'junior',
      'email' => 'junior@test.ru',
      'password' => bcrypt('password'),
      'role' => 'junior',
]);

/**
 * Состояние для учетной записи базового пользователя
 */
$factory->state(User::class, 'user', [
      'name' => 'user',
      'email' => 'user@test.ru',
      'password' => bcrypt('password'),
      'role' => 'user',
]);
