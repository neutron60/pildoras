<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'category_id' => 'sometimes|required',
            'code' => 'sometimes|required|unique:articles|min:2|max:20',
            'name' => 'required|min:2|max:60',
            'description' => 'required|min:2|max:400',
            'image1' => 'filled|image|max:1000|min:50',
            'image2' => 'filled|image|max:1000|min:50',
            'image3' => 'filled|image|max:1000|min:50'
        ];
    }
}
