<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'title' => 'required|min:2\max:50',
            'category' => 'required|min:2\max:50',
            'description' => 'required|min:2\max:200',
            'image' => 'required|filled|image|max:1000|min:100',
            'category' => 'required|min:2|max:50',
            'department_id' => 'required'
        ];
    }
}
