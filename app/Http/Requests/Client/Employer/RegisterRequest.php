<?php

namespace App\Http\Requests\Client\Employer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'passwords' => 'required|max:255',
            'confirm-password' => 'required|max:255|same:passwords',
            'term' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute không để trống',
            'name.max' => ':attribute tối đa 255 ký tự',

            'email.required' => ':attribute không để trống',
            'email.email' => ':attribute không đúng định dạng. Vd: abc@gmail.com',
            'email.max' => ':attribute tối đa 255 ký tự',
            'email.unique' => ':attribute đã tồn tại',

            'passwords.required' => ':attribute không để trống',
            'passwords.max' => ':attribute tối đa 255 ký tự',

            'confirm-password.required' => ':attribute không để trống',
            'confirm-password.max' => ':attribute tối đa 255 ký tự',
            'confirm-password.same' => ':attribute không trùng khớp mật khẩu',

            'term.required' => 'Vui lòng đồng ý với các điều khoản',
        ];


    }

    public function attributes(): array
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'passwords' => 'Mật khẩu',
            'confirm-password' => 'Xác nhận mật khẩu',
        ];
    }
}
