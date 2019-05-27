<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/home', '/');

Auth::routes();

//Группа данных для модели Task
$groupDataTask = [
    'namespace' => 'Tasks',
];

Route::group($groupDataTask, function () {
    Route::resource(
        '/',
        'TaskController',
        ['only' => ['index']]
    );
});

//Группа данных для модели User пользователя Senior
$groupDataUserSenior = [
    'namespace' => 'Senior\User',
    'prefix' => 'senior',
    'as' => 'senior.',
    'middleware' => 'auth',
];

Route::group($groupDataUserSenior, function () {
    Route::resource('users', 'UserController');
});

//Группа данных для модели Task пользователя Senior
$groupDataTaskSenior = [
    'namespace' => 'Senior\Task',
    'prefix' => 'senior',
    'as' => 'senior.',
    'middleware' => 'auth',
];

Route::group($groupDataTaskSenior, function () {
    Route::resource('tasks', 'TaskController');
});

//Группа данных для модели Task пользователя Junior
$groupDataTaskJunior = [
    'namespace' => 'Junior\Task',
    'prefix' => 'junior',
    'as' => 'junior.',
    'middleware' => 'auth',
];

Route::group($groupDataTaskJunior, function () {
    Route::resource(
        'tasks',
        'TaskController',
        ['only' => ['index', 'show', 'update']]
    );
});

//Группа данных для модели Setting
$groupDataSettings = [
    'namespace' => 'Settings',
    'middleware' => 'auth',
];

Route::group($groupDataSettings, function () {
    Route::resource(
        'settings',
        'SettingsController',
        ['only' => ['edit', 'update', 'destroy']],
    )->parameters(['settings' => 'user']);
});
