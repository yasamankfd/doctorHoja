<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SickModalRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'modal_sick_name' => 'required|string',
            'modal_sick_phone' => 'required|min:11|numeric',
            'modal_sick_description' => 'required|string',
            'modal_sick_date' => 'required',
            'modal_sick_sdate' => 'required',
            'modal_sick_edate' => 'required',
            'modal_sick_nationalCode' => [
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
