<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                $content = 'required|max:255|unique:questions,content';
                break;
            case 'PUT':
                $content = 'required|max:255|unique:questions,content,'.$this->id;
                break;
        }
        return [
            'content' => $content,
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung không được để trống',
            'content.max' => 'Nội dung tối đa 255 ký tự',
            'content.unique' => 'Câu hỏi có nội dung như này đã tồn tại'
        ];
    }
}
