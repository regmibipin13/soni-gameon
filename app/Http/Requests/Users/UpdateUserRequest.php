<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . request()->route('user')->id],
            'phone' => ['required', 'unique:users,phone,' . request()->route('user')->id],
            'user_type' => ['required'],
            'password' => ['nullable'],
            'roles' => ['nullable']
        ];
    }
}
