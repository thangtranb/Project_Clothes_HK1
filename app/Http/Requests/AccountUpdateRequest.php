<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:100'.$this->id,
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Danh mục không được để trống',
            
            'name.min' => 'Tên danh mục tối thiểu là 3 ký tự',
            'name.max' => 'Tên danh mục tối đa là 100 ký tự',
            'email.required' => 'Vui lòng điền email!',
            'email.email' => 'Sai định dạng email!',
            'password.required' => 'Vui lòng điền mật khẩu!',
        ];
    }
}
