<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmRequest extends FormRequest
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
            'checkIn' => 'required|date',
            'checkOut' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'checkIn.required' => 'Ngày đặt phòng không được để trống!',
            'checkOut.required' => 'Ngày trả phòng không được để trống!',
        ];
    }
}
