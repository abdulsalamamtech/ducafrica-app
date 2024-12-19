<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserInstallmentRequest extends FormRequest
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
            'event_id' => ['required', 'string'],
            // 'user_id' => ['required', 'string'],
            // 'booked_event_id' => ['required', 'string'],
            // 'approved_by' => ['required', 'string'],
            // 'approved' => ['required', 'string'],
            // 'amount' => ['required', 'string'],
            // 'paid' => ['required', 'string'],
            // 'balance' => ['required', 'string'],
            // 'settle' => ['required', 'string'],
        ];
    }
}
