<?php

namespace App\Http\Requests\Client\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => ':attribute không được để trống.',
            'name.string' => ':attribute phải là một chuỗi văn bản.',
            'name.max' => ':attribute tối đa 255 ký tự.',

            'phone.required' => ':attribute không được để trống.',

            'email.required' => ':attribute không được để trống.',
            'email.email' => ':attribute không đúng định dạng.',
            'email.max' => ':attribute tối đa 255 ký tự.',

            'message.required' => ':attribute không được để trống.',
            'message.string' => ':attribute phải là một chuỗi văn bản.',
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'email' => 'Địa chỉ email',
            'message' => 'Nội dung yêu cầu',
        ];
    }
}
