<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'center_id' => ['required', 'string', 'exists:centers,id'],
            'event_type_id' => ['required', 'string', 'exists:event_types,id'],
            'name' => ['required', 'string'],
            'event_roles' => ['required', 'min:1', 'array'],
            'description' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'cost' => ['required', 'string'],
            'slots' => ['required', 'string'],
            'status' => ['nullable', 'string'],
            'contact_name' => ['required', 'string'],
            'contact_phone_number' => ['required', 'string']
        ];
    }
}
