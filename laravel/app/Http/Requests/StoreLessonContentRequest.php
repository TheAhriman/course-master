<?php

namespace App\Http\Requests;

use App\Jobs\StoreMediaForLessonContent;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            'description' => 'nullable | string | max:1000',
            'lesson_id' => 'integer | required'
        ];
    }

    public function prepareForValidation()
    {
        if($this->media_type != "text") {
            $path = 'public/' . Str::random(40);
            dispatch(new StoreMediaForLessonContent($this, $path));
            $this->merge(['value' => $path]);
        }
    }
}
