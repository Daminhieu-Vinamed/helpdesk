<?php

namespace App\Http\Requests\User\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                $validate = [
                    'employee_code' => 'required|max:255|unique:users,employee_code',
                    'username' => 'nullable|max:255|unique:users,username',
                    'email' => 'required|max:255|email|unique:users,email',
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'full_name' => 'required|max:255',
                    'role' => 'required',
                    'status' => 'required',
                    'password' => 'required|max:255'
                ];
                break;
            case 'PUT':
                $validate = [
                    'employee_code' => 'required|max:255|unique:users,employee_code,'.$this->id,
                    'username' => 'nullable|max:255|unique:users,username,'.$this->id,
                    'email' => 'required|max:255|email|unique:users,email,'.$this->id,
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'full_name' => 'required|max:255',
                    'role' => 'required',
                    'status' => 'required'
                ];
                if (array_key_exists('password', $this->input())) {
                    $validate['password'] = 'required|max:255';
                }
                break;
        }
        return $validate;
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
