<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Controllers\Controller;

/**
 * Класс SettingsController управляет потоками данных модели User
 */
class SettingsController extends Controller
{
    /**
     * Конструктор класса SettingsController
     */
    public function __construct()
    {
        $this->middleware('can:settings,user');
    }
    /**
     * Отображение информации о пользователе
     *
     * @param  \App\Models\User  $user
     * @return view
     */
    public function edit(User $user)
    {
        return view('settings.edit', compact('user'));
    }

    /**
     * Обновление информации учетной записи
     *
     * @param  App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return view
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('settings.edit', $user);
    }

    /**
     * Удаление учетной записи
     *
     * @param  \App\Models\User  $user
     * @return view
     */
    public function destroy(User $user)
    {
        User::destroy($user->user_id);

        return redirect()->route('login');
    }
}
