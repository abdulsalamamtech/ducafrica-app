<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCenterRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'payment_id' => ['required', 'string'],
            'belongs_to_user' => ['required', 'exists:users,id'],
            'phone_number' => ['required', 'string'],
            'center_type_id' => ['required', 'string'],
            'address' => ['required', 'string'],
            'map_url' => ['required', 'string'],
            'state' => ['required', 'string']
        ];
    }
}
