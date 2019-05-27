<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task_name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'integer', 'min:0', 'max:500'],
            'status' => ['required', 'integer', 'min:0', 'max:2'],
            'user_id' => ['required', 'integer'],
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил проверки.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.integer' => 'Выберите исполнителя',
            'status.integer' => 'Выберите статус',
        ];
    }
}
