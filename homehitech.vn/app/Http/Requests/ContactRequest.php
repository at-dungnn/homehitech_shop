<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'address'=>'required',
            'email'=>'required',
            'phone_canhan'=>'required',
            'phone_congty'=>'required',
            'skype'=>'required',
            'facebook'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'address.required' =>'Địa chỉ không được để trống',
            'email.required' =>'Email không được để trống',
            'phone_canhan.required' =>'Số điện thoại cá nhân không được để trống',
            'phone_congty.required' =>'Số điện thoại công ty không được để trống',
            'skype.required' =>'Skype không được để trống',
            'facebook.required' =>'Facebook không được để trống'
        ];
    }
}
