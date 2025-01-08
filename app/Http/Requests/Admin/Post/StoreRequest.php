<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required',
            'title.string' => 'The title must be a string',
            'content.required' => 'The content field is required',
            'content.string' => 'The content must be a string',
            'preview_image.required' => 'The preview image field is required',
            'preview_image.file' => 'The preview image must be a file',
            'main_image.required' => 'The main image field is required',
            'main_image.file' => 'The main image must be a file',
            'category_id.required' => 'The category field is required',
            'category_id.integer' => 'The category must be an integer',
            'category_id.exists' => 'The category must be an exists',
            'tag_ids.integer' => 'The tags must be an integer',
            'tag_ids.exists' => 'The tags must be an exists'
        ];
    }
}
