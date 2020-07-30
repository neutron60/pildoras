<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'requires_shipping' => 'sometimes|required',
            'courier_name' => 'sometimes|required',
            'shipping_address' => 'sometimes|required|min:2|max:500',
            'shipping_city' => 'sometimes|required|min:2|max:50',
            'shipping_state' => 'sometimes|required|min:2|max:50',
            'payment_type' => 'sometimes|required',
            'amount_paid' => 'sometimes|required',
            'payment_day' => 'sometimes|required',
            'issuing_bank' => 'sometimes|required|min:2|max:50|',
            'receiving_bank' =>'sometimes|required|min:2|max:50|',
            'operation_number' =>'sometimes|required|min:2|max:50|',
            'verified_payment' => 'sometimes|required',
            'invoice_number' => 'sometimes|required|min:2|max:50|',
            'verified_payment' => 'sometimes|required',
            'invoice_number' => 'sometimes|required|min:2|max:50|'
        ];
    }
}
