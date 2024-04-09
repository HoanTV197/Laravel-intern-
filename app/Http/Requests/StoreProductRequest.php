<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends BaseRequest
{   

    public function rules(): array
    {
        return [
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required',
            'origin' => 'required',
            'categories' => 'required|array',        
        ];
    }
    
}
