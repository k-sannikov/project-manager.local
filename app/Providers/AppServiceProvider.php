<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Task;
use App\Observers\UserObserver;
use App\Observers\TaskObserver;
use Jenssegers\Date\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Регистрация observer
        User::observe(UserObserver::class);
        Task::observe(TaskObserver::class);
        // Передача локали в пакет Дата
        Date::setlocale(config('app.locale'));
    }
}
