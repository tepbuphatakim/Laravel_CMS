<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255|unique:products,name',
            'price' => 'nullable|regex:/^\d+(\.\d{1,2})?$/', // 999.99, 99.9, 99
            'image' => 'required'
        ];
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'] = 'required|max:255|unique:products,name,' . $this->product;
            $rules['image'] = 'nullable';
        }

        return $rules;
    }
}
