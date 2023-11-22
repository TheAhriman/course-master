<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreChatMessageRequest extends FormRequest
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
            'chat_id' => 'integer|required',
            'message' => 'string|required',
            'user_id' => 'integer|required',
            'sent_at' => 'date'
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::id(),
            'sent_at' => Carbon::now()
        ]);
    }
}
