<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Це поле обов\'язкове для заповнення',
            'name.string' => 'Тут повинено бути ім\'я користувача',
            'email.required' => 'Це поле обов\'язкове для заповнення',
            'email.email' => 'Тут повинен бути email',
            'email.unique' => 'Цей email вже є в базі',
        ];
    }
}
