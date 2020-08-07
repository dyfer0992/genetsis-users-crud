<?php

namespace App\Http\Requests\Users;

use App\Domain\Users\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|string',
            'surname'       => 'required|string',
            'address'       => 'sometimes|nullable|string',
            'email'         => 'required|email|unique:user_users',
            'province_id'   => 'required|exists:provincias,id_provincia',
            'gender'        => 'required|in:' . implode(',', User::GENDERS),
            'preferences'   => 'sometimes|array',
            'preferences.*' => 'sometimes|exists:preferences,preference_id',
        ];
    }
}
