<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Task;

class UserObserver
{
    /**
     * Обработка события "Удаление"
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        $tasks = Task::where('user_id', $user->user_id)->get();

        $this->setStatus($tasks);
        $this->setUserID($tasks);
    }

    /**
     * Установить статус задаче
     *
     * @param  \App\Models\Task  $task   The task
     */
    public function setStatus($tasks)
    {
        foreach ($tasks as $task) {
            $task->update(['status' => 2]);
        }
    }

    /**
     * Установить ID пользователя
     *
     * @param  \App\Models\Task  $task   The task
     */
    public function setUserID($tasks)
    {
        foreach ($tasks as $task) {
            $task->update(['user_id' => 0]);
        }
    }
}
