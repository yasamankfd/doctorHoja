<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'add_area_name' => 'required|max:50|string',
            'add_area_status' => 'required',
        ];
    }
    public function messages()
    {
        return[];
    }

}
