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
            'title' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'other_name' => ['max:255'],
            'address' => [],
            'postal_code' => [],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required','string', 'max:255'],
            'phone' => ['required','string', 'max:255'],
            'phone_type' => [],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['string', 'max:255'],
            'dob' => ['required','string', 'max:255'],
            'nok' => ['required', 'string', 'max:255'],
            'nok_relationship' => ['required', 'string', 'max:255'],
            'nok_phone' => ['required', 'string', 'max:255'],
            'food_allergies' => [],
            'diets' => ['nullable','string', 'max:255'], // string
            'other_diets' => [], // array
            'other_disability' => [],
            'center' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_clue' => [ 'string', 'max:255'],
        ];
    }
}
