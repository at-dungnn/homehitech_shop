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
        return [
            'ten_sanpham'=>'required',
            'ma_sanpham' =>'required|unique:product',
            'category_id'=>'required',
            'thong_so'   =>'required',
            'gia'        =>'required|numeric',
            'giam_gia'   =>'nullable|numeric',
            'so_luong'   =>'required|numeric',

        ];
    }
    public function messages()
    {
        return [
            'ten_sanpham.required' =>'Tên sản phẩm không được để trống',
            'ma_sanpham.required'  =>'Mã sản phẩm không được để trống',
            'ma_sanpham.unique'    =>'Mã sản phẩm đã tồn tại',
            'category_id.required' =>'Danh mục không được để trống',
            'thong_so.required'    =>'Thông số không được để trống',
            'gia.required'         =>'Giá tiền không được để trống',
            'gia.numeric'          =>'Giá tiền phải là số',
            'giam_gia.numeric'     =>'Phần trăm phải là số',
            'so_luong.numeric'     =>'Số lượng phải là số',
            'so_luong.required'    =>'Số lượng không được để trống'

        ];
    }
}
