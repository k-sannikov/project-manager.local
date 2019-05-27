<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Класс TaskController управляет потоками данных модели Task
 */
class TaskController extends Controller
{
    /**
     * Отображение списка задач
     *
     * @return view
     */
    public function index()
    {
        $tasks = Task::leftJoin('users', 'tasks.user_id', '=', 'users.user_id')
            ->paginate(20);

        return view('index', compact('tasks'));
    }
}
