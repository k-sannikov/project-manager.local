<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Класс TaskPolicy
 */
class TaskPolicy
{
    use HandlesAuthorization;


    /**
     * Проверка имеет ли пользователь права senior
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function senior(User $user)
    {
        if (Auth::user()->role == 'senior') {
            return true;
        }
        return null;
    }

    /**
     * Проверка имеет ли пользователь права junior
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function junior(User $user)
    {
        if (Auth::user()->role == 'junior') {
            return true;
        }
        return null;
    }
}
