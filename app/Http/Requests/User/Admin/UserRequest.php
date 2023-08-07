<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

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
        switch ($this->method())
        {
            case 'POST':
                $email = 'required|max:255|email|unique:users,email';
                $employee_code = 'required|max:255|unique:users,employee_code';
                $username = 'nullable|max:255|unique:users,username';
                $password = 'required|max:255';
                break;
            case 'PUT':
                $email = 'required|max:255|email|unique:users,email,'.$this->id;
                $employee_code = 'required|max:255|unique:users,employee_code,'.$this->id;
                $username = 'nullable|max:255|unique:users,username,'.$this->id;
                $password = 'nullable|max:255';
                break;
        }
        return [
            'employee_code' => $employee_code,
            'username' => $username,
            'email' => $email,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'full_name' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'password' => $password
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

            'role.required' => 'Vai trò không được để trống',
            'status.required' => 'Trạng thái không được để trống',

            'password.max' => 'Mật khẩu tối đa 255 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}
