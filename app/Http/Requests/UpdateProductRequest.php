<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required',
            'origin' => 'required',
            'category_ids' => 'required|array',
        ];
    }
}
