<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|max:255|regex:/^[A-Z]+/',
            'pass' =>'required| min:4|max:7',
            'pswd' => 'required| min:4| max:7',
            'email' => 'required|email',
            'image' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'Please Enter only Uppercase Latters',
        ];
    }
}
