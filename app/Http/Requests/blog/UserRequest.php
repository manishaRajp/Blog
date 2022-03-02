<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'password'          => 'required',
            'new_password'      => 'required|min:4',
            'confirm_password'  => 'required|same:new_password'
        ];
    }
}
