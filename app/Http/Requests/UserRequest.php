<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'sometimes|required|min:2|max:50',
            'lastname' => 'sometimes|required|min:2|max:50',
            'id_type' => 'sometimes|required',
            'id_number' => 'sometimes|required|min:6|max:10',

        ];
    }
}
