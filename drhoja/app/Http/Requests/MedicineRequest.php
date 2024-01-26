<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
{

    public function authorize()
    {
        return true;

    }


    public function rules()
    {
        return [
            'add_medicine_name' => 'required|max:60|string',
            'add_medicine_status' => 'required',
        ];
    }
    public function messages()
    {
        return[];
    }
}
