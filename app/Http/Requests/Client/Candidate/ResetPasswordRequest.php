<?php

namespace App\Http\Requests\Client\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' =>  'required|max:255|min:8',
            'confirm-password' => 'required|max:255|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => ':attribute không được để trống',
            'confirm-password.required' => ':attribute không được để trống',
            'password.max' => ':attribute tối đa 255 ký tự',
            'password.min' => ':attribute ít nhất 8 ký tự',
            'confirm-password.max' => ':attribute tối đa 255 ký tự',
            'confirm-password.same' => ':attribute phải trùng khớp với mật khẩu',
        ];


    }

    public function attributes(): array
    {
        return [
            'password' => 'Mật khẩu',
            'confirm-password' => 'Xác nhận mật khẩu',
        ];
    }
}
