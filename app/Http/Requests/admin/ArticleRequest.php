<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ArticleRequest extends FormRequest
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
            'writer' => 'required|max:255',
            'article_title' => 'required|max:255',
            'main_img' => 'image',
            // 'id_video' => 'videos,id',

            'article_contens' => 'required',
            'id_categories' => 'required:exists:categories,id',
            'id_sub_categories' => 'required:exists:subCategories,id'

        ];
    }
}
