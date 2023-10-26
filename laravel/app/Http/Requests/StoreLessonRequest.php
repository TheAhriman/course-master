<?php

namespace App\Http\Requests;

use App\Http\Services\CourseService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class StoreLessonRequest extends FormRequest
{
    public function __construct(private readonly CourseService $courseService,
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

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
            'title' => 'string | required | max:100',
            'slug' => 'string | required | max: 2048',
            'description' => 'string | required',
            'course_id' => 'integer | required',
            'priority' => 'integer '
        ];
    }

    public function prepareForValidation()
    {
        if (!Auth::user()->hasRole('admin')) {
            $this->merge([
                'priority' => $this->courseService->findFirstById($this->course_id)->lessons->keys()->count()+1
            ]);
        }
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
