<?php

namespace App\Http\Requests\Client\Candidate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
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
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required', 'min:6', 'different:old_password'],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu có ít nhất 6 kí tự',
            'new_password.different' => 'Mật khẩu mới không được trùng với mật khẩu cũ',
            'new_password_confirmation.required' => 'Trường này không được để trống',
            'new_password_confirmation.same' => 'Mật khẩu xác nhận không khớp',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!Hash::check($this->old_password, $this->user()->password)) {
                $validator->errors()->add('old_password', 'Mật khẩu cũ không đúng');
            }
        });
    }
}
