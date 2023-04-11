<?php

namespace App\Http\Requests\NewsController;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Введите название',
            'title.string' => 'Название должно быть строкой',

            'content.required' => 'Введите текст',
            'content.string' => 'Текст должен быть строкой'
        ];
    }
}
