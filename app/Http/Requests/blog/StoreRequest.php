<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function attributes()
    {
        return[
            'category_id'=> 'category'
        ];
    }
    public function rules()
    {
        return [

            'category_id' => 'required|not_in:0',
            'title' => 'required',
            // 'description' => 'required|alpha',
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp'
        ];
    }
    public function messages()
    {
        return [
            'category_id.not_in' => 'Please select Category',
        ];
    }
}
