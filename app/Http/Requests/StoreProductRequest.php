<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends BaseRequest
{   

    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required|url',
            'origin' => 'required', 
        ];
    }
    
}
