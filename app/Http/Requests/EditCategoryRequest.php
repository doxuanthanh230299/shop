<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCategoryRequest extends FormRequest
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
        return [
            //
            "name" => [
                "required",
                Rule::unique('categories')->ignore($this->id),
            ],
            "parent" => "required",
        ];
    }

    public function messages()
    {
        return [
            //
            "name.required" => "Vui lòng điền tên danh mục",
            "parent.required" => "Chọn danh mục cha",
        ];
    }
}
