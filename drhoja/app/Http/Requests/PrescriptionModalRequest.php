<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrescriptionModalRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }


    public function rules()
    {
        return [
            'modal_prescription_name' => 'required|string',
            'modal_prescription_phone' => 'required|min:11|numeric',
            'modal_prescription_nationalCode' => [
                'required',
                'min:10|max:10',
                Rule::unique('users', 'national_code'),
            ],
            'modal_prescription_date' => 'required',
            'modal_prescription_description' => 'required|string',

        ];
    }
    public function messages()
    {
        return[];
    }
}
