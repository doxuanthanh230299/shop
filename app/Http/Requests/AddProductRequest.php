<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            "name" => "required",
            "code" => "required|unique:products",
            "price" => "required",
            "info" => "required",
            "describer" => "required",
            "image" => "required",
            "featured" => "required",
            "state" => "required",
            "categories_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên sản phẩm không được để trống",
            "code.required" => "Mã sản phẩm không được để trống",
            "code.unique" => "Mã sản phẩm đã tồn tại",
            "category.required" => "Danh mục không được để trống",
            "price.required" => "Gía sản phẩm không được để trống",
            "info.required" => "Thông tin sản phẩm không được để trống",
            "describer.required" => "Mô tả sản phẩm không được để trống",
            "image.required" => "Ảnh không được để trống",
            "featured.required" => "Không được để trống",
            "state.required" => "Trạng thái sản phẩm không được để trống",
            "categories_id.required" => "Danh mục sản phẩm không được để trống",
        ];
    }
}
