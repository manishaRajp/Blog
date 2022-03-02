<?php

namespace App\Http\Requests\blog;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Blog;

use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return  true;
    }
    public function rules(Request $request)
    {
        return [
            'category_id' => 'required|not_in:0',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif'
        ];
    }
}
