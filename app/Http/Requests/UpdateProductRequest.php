<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => "required|max:255|unique:products,name,{$this->product}",
            'price' => 'required|numeric',
            
        ];
    }
}
