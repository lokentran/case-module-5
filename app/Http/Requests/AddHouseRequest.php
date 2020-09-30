<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddHouseRequest extends FormRequest
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
            'address' => 'required|min:6',
            'description' => 'required|min:6',
            'price' => 'required|numeric|min:100000',
            'photos' => 'required|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.min' => 'Tên dài tối thiểu 6 kí tự',
            'address.required' => 'Địa chỉ không được để trống!',
            'address.min' => 'Địa chỉ dài tối thiểu 6 kí tự',
            'description.required' => 'Mô tả không được để trống',
            'price.required' => 'Giá không được để trống',
            'price.min' => 'Giá thấp nhất là 100.000 VNĐ',
            'description.min' => 'Địa chỉ dài tối thiểu 30 kí tự',
            'photos.max' => 'Dung lượng ảnh tối đa là 10Mb',
            'photos.required'=>'Ảnh không được để trống'
        ];
    }
}
