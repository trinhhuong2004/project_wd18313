<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
            // Thêm các quy tắc khác nếu cần
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',

            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 0.',

            'image.required' => 'Đường dẫn hình ảnh là bắt buộc.',

            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.exists' => 'Danh mục sản phẩm không hợp lệ.',

            // Thêm các thông báo lỗi khác nếu cần
        ];
    }
}
