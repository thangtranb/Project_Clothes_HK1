<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product|min:3|max:100',
            'price' => 'numeric|min:0',
            'sale_price' => 'numeric|min:0|lte:price',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif,webp',
            'category_id' => 'required|exists:category,id',
            'gender' => 'required|in:male,female,unisex',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu là 3 ký tự',
            'name.max' => 'Tên danh mục tối đa là 100 ký tự',
            'price.numeric' => 'Bắt buộc nhập số!',
            'sale_price.numeric' => 'Bắt buộc nhập số!',
            'image.required' => 'Chưa tải ảnh lên',
            'image.mimes' => 'Ảnh phải có đuôi:jpg,jpeg,png,gif,webp',
            'category_id.required' => 'Chưa chọn tên danh mục cho sản phẩm'
        ];
    }
}
