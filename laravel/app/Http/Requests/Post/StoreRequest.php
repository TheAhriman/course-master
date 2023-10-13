<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string | required | max:50',
            'slug' => 'string | required',
            'user_id' => 'integer | required',
            'preview_description' => 'string | required',
            'description' => 'string | required | max:16777215',
            'category_id' => 'integer | required',
            'date' => 'date | required | before:tomorrow',
            'tag_id.*' => 'numeric',
            'image' => 'image | required'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation() : void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
