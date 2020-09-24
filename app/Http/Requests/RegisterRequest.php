<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32|confirmed',
            'address' => 'required|min:6',
            'phone' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.min' => 'Tên dài tối thiểu 6 kí tự',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email sai định dạng! Ví dụ: abc@gmail.com',
            'email.unique' => 'Email trùng với email của user khác',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải dài hơn 6 ký tự.',
            'password.max' => 'Mật khẩu phải không được vượt quá 32 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp!',
            'address.required' => 'Địa chỉ không được để trống!',
            'address.min' => 'Địa chỉ dài tối thiểu 6 kí tự',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại tối thiểu 10 có 10 số',
        ];
    }
}
