<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'=>'required | min:5 | regex:/^[a-zа-я\s]+$/iu',
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
            'name.required' => 'Имя должно быть указано',
            'name.min' => 'Имя не должно быть короче 5 символов',
            'name.regex' => 'Имя не может содержать символы',
        ];
    }
}
