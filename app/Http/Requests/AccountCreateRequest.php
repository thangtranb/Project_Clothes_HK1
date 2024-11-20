<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
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
            'name' => 'required|unique:account|min:3|max:100',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại, chọn tên khác',
            'name.min' => 'Tên danh mục tối thiểu là 3 ký tự',
            'name.max' => 'Tên danh mục tối đa là 100 ký tự',
            'email.required' => 'Vui lòng điền email!',
            'email.email' => 'Sai định dạng email!',
            'password.required' => 'Vui lòng điền mật khẩu!',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Nhập đủ 10 số',
            'address' => 'Vui lòng nhập địa chỉ'
        ];
    }
}
