<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentModalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'modal_payment_name' => 'required|max:120|string',
            'modal_payment_number' => 'required|numeric',
            'modal_payment_phone' => 'required|min:11|numeric',
            'modal_payment_amount' => 'required',
            'modal_payment_date' => 'required',
            'modal_payment_description' => 'required|max:500|string',
            'modal_payment_nationalCode' => [
                'required',
                'min:10|max:10',
                Rule::unique('users', 'national_code'),
            ],
        ];
    }
    public function messages()
    {
        return[];
    }
}
