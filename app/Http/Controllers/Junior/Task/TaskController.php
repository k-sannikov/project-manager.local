<?php

namespace App\Http\Controllers\Junior\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * Класс TaskController управляет потоками данных модели Task
 */
class TaskController extends Controller
{
    /**
     * Конструктор класса TaskController
     */
    public function __construct()
    {
        $this->middleware('can:junior');
    }

    /**
     * Вывод списка задач junior
     *
     * @return view
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->paginate(20);

        return view('junior.tasks.index', compact('tasks'));
    }

    /**
     * Вывод информации об одной задаче
     *
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function show(Task $task)
    {
        $user = User::find($task->user_id);

        return view('junior.tasks.show', compact('task', 'user'));
    }

    /**
     * Обновление записи задачи
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function update(Request $request, Task $task)
    {
        $task->status = 1;
        $task->save();

        return redirect()->route('junior.tasks.index');
    }

}
