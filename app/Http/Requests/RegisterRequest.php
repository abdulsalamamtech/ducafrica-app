<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:8'],
            'first_name' => ['required', 'string', 'max:32'],
            'last_name' => ['required', 'string', 'max:32'],
            'other_name' => ['nullable', 'max:32'],
            'address' => [],
            'postal_code' => [],
            'email' => ['required', 'string', 'email', 'max:64', 'unique:users'],
            'dob' => ['required','string', 'max:32'],
            'phone' => ['required','string', 'max:14'],
            'phone_type' => [],
            'city' => ['required', 'string', 'max:32'],
            'state' => ['required', 'string', 'max:32'],
            'country' => ['string', 'max:32'],
            'dob' => ['required','string', 'max:16'],
            'nok' => ['required', 'string', 'max:32'],
            'nok_relationship' => ['required', 'string', 'max:32'],
            'nok_phone' => ['required', 'string', 'max:14'],
            'food_allergies' => [],
            'diets' => ['nullable','string', 'max:255'], // string
            'other_diets' => [], // array
            'other_disability' => [],
            'center_id' => ['nullable', 'string', 'max:32'],
            'password' => ['required', 'string', 'min:8', 'max:32', 'confirmed'],
            'password_clue' => [ 'string', 'max:32'],
        ];
    }
}
