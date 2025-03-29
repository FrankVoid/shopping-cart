<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'zip' => 'required|integer|min:20000|max:90000',
        ];
    }

    public function messages()
    {
        return [
            'zip.required' => 'Zip code is required',
            'zip.integer' => 'Zip code must be an integer',
            'zip.min' => 'Zip code must be at least 20000',
            'zip.max' => 'Zip code must be at most 90000',
        ];
    }
}
