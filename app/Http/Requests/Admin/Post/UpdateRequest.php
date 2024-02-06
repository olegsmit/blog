<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле обов\'язкове для заповнення',
            'title.string' => 'Тут повинен бути текст',
            'content.required' => 'Це поле обов\'язкове для заповнення',
            'content.string' => 'Тут повинен бути текст',
            'preview_image.required' => 'Це поле обов\'язкове для заповнення',
            'preview_image.file' => 'Тут повинено бути зображення',
            'main_image.required' => 'Це поле обов\'язкове для заповнення',
            'main_image.file' => 'Тут повинено бути зображення',
            'category_id.required' => 'Тут повинено бути зображення',
            'category_id.integer' => 'Виберіть категорію з існуючих',
            'category_id.exists' => 'Виберіть категорію з існуючих',
            'tag_ids.array' => 'Проблема з вибором тегу',
        ];
    }
}
