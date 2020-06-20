<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseCourierRequest extends FormRequest
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
            'requires_shipping' => 'required',
            'courier_name' => 'required',
            'shipping_address' => 'required|min:2|max:2000',
            'shipping_city' => 'required|min:2|max:2000',
            'shipping_state' => 'required|min:2|max:2000'
        ];
    }
}
