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
     * Проверка имеет ли пользователь права доступа к настройкам пользователя
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function settings(User $model, User $user)
    {
        if ($model->user_id == $user->user_id) {
            return true;
        }
        return null;
    }
}
