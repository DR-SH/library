<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'genre'=>'required | min:3 | regex:/^[a-zа-я\s]+$/iu',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'genre.required' => 'Жанр должен быть указан',
            'genre.min' => 'Жанр не должен быть короче 3 символов',
            'genre.regex' => 'Жанр не может содержать символы',
        ];
    }
}
