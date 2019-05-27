<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends StoreUserRequest
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
        $user_id = $this->route('user')->user_id;

        return array_merge(parent::rules(), [
            'email' => [Rule::unique('users')->ignore((isset($user_id) ? $user_id : "0"), 'user_id')],
            'password' => ['nullable'],
            'role' => ['string'],
        ]);
    }
}
