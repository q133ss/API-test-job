<?php

namespace App\Http\Requests\AuthController;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Поле имя должно быть строкой',
            'name.max' => 'Максимальное колличество символов для поля Имя 255',

            'email.required' => 'Введите Email',
            'email.string' => 'Поле Email должно быть строкой',
            'email.email' => 'Формат Email неверный',
            'email.unique' => 'Пользователь с таким Email уже существует',
            'email.max' => 'Максимальное колличество символов для поля Email 255',

            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Минимальная длина пароля 8 символов',
            'password.confirmed' => 'Пароли не совпадают',

            'password_confirmation.required' => 'Подтвердите пароль',
            'password_confirmation.min' => 'Минимальная длина пароля 8 символов'
        ];
    }
}
