<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   /* public function authorize()
    {
        return false;
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:books,'. $this->book,
            'author' => 'required',
            'released_at' => 'required',
            'pages' => 'required',
            'description' => 'required',
            'language_code' => 'required|min:2|max:3',
            'isbn' => 'required|digits:10',
            'in_stock' => 'required',
            
        ];
    }
}
