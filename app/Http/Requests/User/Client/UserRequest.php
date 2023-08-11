<?php

namespace App\Http\Requests\User\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'employee_code' => 'required|max:255|unique:users,employee_code,'.Auth::user()->id,
            'username' => 'nullable|max:255|unique:users,username,'.Auth::user()->id,
            'email' => 'required|max:255|email|unique:users,email,'.Auth::user()->id,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'full_name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'employee_code.required' => 'Mã nhân viên không được để trống',
            'employee_code.max' => 'Mã nhân viên tối đa 255 ký tự',
            'employee_code.unique' => 'Mã nhân viên đã tồn tại',

            'username.max' => 'Tên tài khoản tối đa 255 ký tự',
            'username.unique' => 'Tên tài khoản đã tồn tại',

            'email.required' => 'E-mail không được để trống',
            'email.max' => 'E-mail tối đa 255 ký tự',
            'email.email' => 'E-mail không đúng định dạng',
            'email.unique' => 'E-mail đã tồn tại',

            'first_name.max' => 'Họ tối đa 255 ký tự',
            'first_name.required' => 'Họ không được để trống',

            'last_name.max' => 'Tên tối đa 255 ký tự',
            'last_name.required' => 'Tên không được để trống',

            'full_name.max' => 'Họ và tên tối đa 255 ký tự',
            'full_name.required' => 'Họ và tên không được để trống',
        ];
    }
}
