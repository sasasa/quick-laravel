<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // var_dump($this->path());
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
            'isbn'     => 'required|unique:books,isbn',
            'title'    => 'required|string|max:20',
            'price'    => 'integer|min:0|hello',
            'publisher'=> 'required|in:翔泳社,技術評論社,日経BP,秀和システム,インプレス',
            'published'=> 'required|date',
            'consent'  => 'accepted',
            'password' => 'required|confirmed',
        ];
    }
}
