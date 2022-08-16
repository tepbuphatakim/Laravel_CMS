<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|max:255|unique:categories,title'
        ];
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['title'] = 'required|max:255|unique:categories,title,' . $this->category;
        }

        return $rules;
    }
}
