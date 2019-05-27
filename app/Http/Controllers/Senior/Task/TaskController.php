<?php

namespace App\Http\Controllers\Senior\Task;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\Task\TaskRequest;
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
        $this->middleware('can:senior,task');
    }
    /**
     * Вывод списка задач senior
     *
     * @return view
     */
    public function index()
    {
        $tasks = Task::leftJoin('users', 'tasks.user_id', '=', 'users.user_id')
            ->paginate(20);

        return view('senior.tasks.index', compact('tasks'));
    }

    /**
     * Вывод формы для создания задачи
     *
     * @return view
     */
    public function create()
    {
        $juniors = User::where('role', 'junior')->get();

        return view('senior.tasks.create', compact('juniors'));
    }

    /**
     * Сохранение задачи
     *
     * @param  App\Http\Requests\Task\TaskRequest  $request
     * @return view
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());

        return redirect()->route('senior.tasks.index');
    }

    /**
     * Отображение информации об одной задаче
     *
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function show(Task $task)
    {
        $user = User::find($task->user_id);

        return view('senior.tasks.show', compact('task', 'user'));
    }

    /**
     * Вывод формы для редактирования задачи
     *
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function edit(Task $task)
    {
        $juniors = User::where('role', 'junior')->get();

        return view('senior.tasks.edit', compact('task', 'juniors'));
    }

    /**
     * Обновление записи задачи
     *
     * @param  App\Http\Requests\Task\TaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('senior.tasks.index');
    }

    /**
     * Удаление задачи
     *
     * @param  \App\Models\Task  $task
     * @return view
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->task_id);

        return redirect()->route('senior.tasks.index');
    }
}
