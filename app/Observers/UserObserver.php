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
            $task->status = 2;
            $task->save();
        }

        foreach ($tasks as $task) {
            $task->user_id = 0;
            $task->save();
        }
    }
}
