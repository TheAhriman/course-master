<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCourseRequest extends FormRequest
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
            'title' => 'string | required | max:255',
            'user_id' => 'integer | required',
            'category_id.*' => 'integer'
        ];
    }

    public function prepareForValidation()
    {
        if(Auth::user()->hasRole('creator')) {
            $this->merge(['user_id' => Auth::id()]);
        }
    }
}
