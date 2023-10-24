<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLessonContentRequest extends FormRequest
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
            'media_type' => 'string | required',
            'value' => 'string | required | max:2048',
            'description' => 'string | max:1000',
            'lesson_id' => 'integer | required'
        ];
    }

    public function prepareForValidation()
    {
        if($this->media_type != "text") {
            $path = $this->file($this->media_type)->store('public');
            $this->merge(['value' => $path]);
        }
    }
}
