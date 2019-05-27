<?php

namespace App\Http\Controllers\Senior\User;

use Gate;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * Класс UserController управляет потоками данных модели User
 */
class UserController extends Controller
{
    /**
     * Конструктор класса UserController
     */
    public function __construct()
    {
        $this->middleware('can:senior,user');
    }

    /**
     * Отображение списка пользователей системы
     *
     * @return view
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('senior.users.index', compact('users'));
    }

    /**
     * Вывод формы для создания пользователя
     *
     * @return view
     */
    public function create()
    {
        return view('senior.users.create');
    }

    /**
     * Сохранение пользователя
     *
     * @param  App\Http\Requests\User\StoreUserRequest  $request
     * @return view
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('senior.users.index');
    }

    /**
     * Отображение информации об одном пользователе
     *
     * @param  \App\Models\User  $user
     * @return view
     */
    public function show(User $user)
    {
        return view('senior.users.show', compact('user'));
    }

    /**
     * Вывод формы для редактирования пользователя
     *
     * @param  \App\Models\User  $user
     * @return view
     */
    public function edit(User $user)
    {
        return view('senior.users.edit', compact('user'));
    }

    /**
     * Обновление записи пользователя
     *
     * @param  App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('senior.users.index');
    }

    /**
     * Удаление информации о пользователе
     *
     * @param  \App\Models\User  $user
     * @return view
     */
    public function destroy(User $user)
    {
        User::destroy($user->user_id);

        return redirect()->route('senior.users.index');
    }
}
