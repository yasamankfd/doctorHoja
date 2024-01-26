<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhysioModalRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'modal_physio_name' => 'required|string',
            'modal_physio_phone' => 'required|min:11|numeric',
            'modal_physio_num_sessions' => 'required|numeric|max:3',
            'modal_physio_nationalCode' => [
                'required',
                'min:10|max:10',
                Rule::unique('users', 'national_code'),
            ],
            'modal_physio_areas' => 'required',
            'modal_physio_types' => 'required',
            'modal_physio_description' => 'required',
        ];
    }
    public function messages()
    {
        return[];
    }
}
