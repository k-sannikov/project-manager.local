<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Обработка события "Обновление"
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updating(Task $task)
    {
        $this->setStatus($task);
    }

    /**
     * Установить статус задаче
     *
     * @param  \App\Models\Task  $task   The task
     */
    public function setStatus(Task $task)
    {
        $needSetStatus = $task->user_id == '0';
        if ($needSetStatus) {
            $task->status = 2;
        }
    }
}
