<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'add_user_name' => 'required|string|max:50',
            'add_user_nationalCode' => [
                'required',
                'min:10|max:10',
                Rule::unique('users', 'national_code'),
            ],
            'add_user_phone' => 'required|min:11|numeric',
            'add_user_username' => 'required|string',
            'add_user_email' => 'required',
            'add_user_pass' => 'required_without:user_id|same:confirm-password',
            'add_user_status' => 'required',
        ];
    }
    public function messages()
    {
        return[];
    }
}
