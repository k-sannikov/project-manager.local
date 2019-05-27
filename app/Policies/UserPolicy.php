<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Класс UserPolicy
 */
class UserPolicy
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
     * Проверка имеет ли пользователь права доступа к настройкам пользователя
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function settings(User $model, User $user)
    {
        if (Auth::user()->user_id == $user->user_id) {
            return true;
        }
        return null;
    }
}
