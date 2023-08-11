<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'passwordBefore' => [
                'required', 
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật khẩu cũ không đúng');
                    }
                },
            ],
            'passwordAfter' => 'required|min:6|max:255',
            'againPasswordAfter' => 'required_with:passwordAfter|same:passwordAfter',
        ];
    }

    public function messages()
    {
        return [
            'passwordBefore.required' => 'Không được để trống trường mật khẩu cũ',

            'passwordAfter.min' => 'Mật khẩu tối thiểu trên 6 ký tự',
            'passwordAfter.max' => 'Mật khẩu tối đa dưới 255 ký tự',
            'passwordAfter.required' => 'Mật khẩu không được để trống',
            
            'againPasswordAfter.required_with' => 'Mật khẩu nhập lại không được để trống',
            'againPasswordAfter.same' => 'Mật khẩu nhập lại phải giống mật khẩu',
        ];
    }
}
