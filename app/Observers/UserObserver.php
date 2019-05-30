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

        foreach ($tasks as $task) {
            $task->update(['status' => 2]);
        }

        foreach ($tasks as $task) {
        $task->update(['user_id' => 2]);
        }
    }
}
