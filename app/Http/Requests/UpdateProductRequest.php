<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'description' => 'sometimes|required|string',
            'category_ids' => 'sometimes|required|array',
        ];
    }
}
