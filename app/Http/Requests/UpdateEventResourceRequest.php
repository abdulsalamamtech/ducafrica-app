<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventResourceRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resource_format' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'event_id' => 'nullable|exists:events,id',
            // Add any other rules as necessary
            'event_resource_roles' => 'required|array',
            'event_resource_roles.*' => 'exists:roles,id',
        ];
    }
}
