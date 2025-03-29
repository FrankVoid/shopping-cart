<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'customer_id' => 'sometimes|exists:customers,id',
            'line_1' => 'sometimes|string|max:45',
            'line_2' => 'sometimes|nullable|string|max:45',
            'city' => 'sometimes|string|max:45',
            'state' => 'sometimes|string|max:45',
            'zip' => 'sometimes|integer|digits:5',
            'status' => 'sometimes|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'The customer ID is required.',
            'line_1.required' => 'The address line 1 is required.',
            'line_1.max' => 'The address line 1 must not exceed 45 characters.',
            'line_2.max' => 'The address line 2 must not exceed 45 characters.',
            'city.required' => 'The city is required.',
            'city.max' => 'The city must not exceed 45 characters.',
            'state.required' => 'The state is required.',
            'state.max' => 'The state must not exceed 45 characters.',
            'zip.required' => 'The zip code is required.',
            'zip.integer' => 'The zip code must be a valid integer.',
            'zip.digits' => 'The zip code must be exactly 5 digits.',
            'status.required' => 'The address status is required.',
            'status.in' => 'The address status must be either active or inactive.',

        ];
    }
}
