<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            "email" => [
                "required",
                Rule::unique('users')->ignore($this->id),
            ],
            "fullname" => "required",
            "password" => "required|min:6|max:16",
            "phone" => "required|min:10",
            "address" => "required",
            "level" => "required",
        ];
    }

    public function messages()
    {

        return [
            //
            "email.required" => "Email không được để trống",
            "fullname.required" => "Tên đầy đủ không được để trống",
            "password.required" => "Mật khẩu không được để trống",
            "password.min" => "Mật khẩu ít nhất 6 kí tự",
            "password.max" => "Mật khẩu tối đa 16 kí tự",
            "phone.required" => "Số điện thoại không được để trống",
            "phone.min" => "Số điện thoại không hợp lệ",
            "address.required" => "Địa chỉ không được để trống",
            "level.required" => "Vui lòng chọn quyền",
        ];
    }
}
