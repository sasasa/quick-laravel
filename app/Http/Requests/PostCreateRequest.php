<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TagRule;

class PostCreateRequest extends FormRequest
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
            'subject'    => 'required|string|max:20',
            'body'    => 'required|string|max:400',
            'files'    => 'required|array',
            'files.*'    => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=600',
            'tags'    => ['max:50', new TagRule],
        ];
    }
}
