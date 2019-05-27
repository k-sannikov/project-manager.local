<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Обработка события "Обновлено"
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        $task = Task::find($task->task_id);
        if (request()->user_id == '0') {
            $task->status = 2;
            $task->save();
        }
    }
}
