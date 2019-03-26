<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required| regex:/^[a-zа-я\s]+$/iu',
            'about'=>'required|min:3',
            'authors' => 'required',
            'genre' => 'required',
            'amount' => 'required|integer',
            'loadCover' => 'file|max:500|mimes:jpeg,png',
            'loadFile' => 'file|max:2000|mimes:doc,txt,pdf',
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
            'title.required' => 'Название книги должно быть заполнено',
            'title.regex' => 'Название книги не может содержать символы',
            'about.required'  => 'Описание книги должно быть заполнено',
            'about.min'  => 'Описание книги должно включать не менее 3-х символов',
            'authors.required'  => 'Необходимо подвязать не менее одного автора',
            'amount.required'  => 'Укажите количество книг на складе',
            'amount.integer'  => 'Количество книг на складе должно быть числом',
            'loadCover.max'  => 'Размер обложки не должен превышать 500 кБ',
            'loadCover.mimes'  => 'Обложка должна иметь расширение jpg или png',
            'loadFile.max'  => 'Размер файла не должен превышать 2000 кБ',
            'loadFile.mimes'  => 'Файл должен иметь расширение txt, doc, pdf',
        ];
    }
}
