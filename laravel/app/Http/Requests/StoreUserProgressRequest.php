<?php

namespace App\Http\Requests;

use App\Http\Services\LessonService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserProgressRequest extends FormRequest
{
    public function __construct(private readonly LessonService $lessonService,
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
            'user_id' => 'required | integer',
            'author_id' => 'required | integer',
            'course_id' => 'required | integer',
            'lesson_id' => 'required | integer'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'author_id' => \Auth::id(),
            'lesson_id' => $this->lessonService->getLessonsFromCourseWithPriority($this->course_id)->first()->id
        ]);
    }
}
