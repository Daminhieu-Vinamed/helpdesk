<?php

namespace App\Http\Requests\Ticket\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'question_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'status' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'question_id.required' => 'Câu hỏi không được để trống',

            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề tối đa 255 ký tự',

            'content.required' => 'Nội dung không được để trống',
            'content.max' => 'Nội dung tối đa 255 ký tự',

            'status.required' => 'Trạng thái không được để trống',

            'user_id.required' => 'Người tạo không được để trống',
        ];
    }
}
