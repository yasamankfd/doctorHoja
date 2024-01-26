<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhysioTypeRequest extends FormRequest
{

    public function authorize()
    {
        return [
            'add_type_name' => 'required|string|max:50',
        ];
    }


    public function rules()
    {
        return [];
    }
    public function messages()
    {
        return[];
    }
}
