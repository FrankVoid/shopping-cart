<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name' => 'sometimes|string|max:45',
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:active,out_of_stock,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The item name is required.',
            'name.max' => 'The item name must not exceed 45 characters.',
            'quantity.required' => 'The item quantity is required.',
            'quantity.integer' => 'The item quantity must be an integer.',
            'quantity.min' => 'The item quantity must be at least 1.',
            'price.required' => 'The item price is required.',
            'price.numeric' => 'The item price must be a valid number.',
            'price.min' => 'The item price cannot be less than 0.',
            'status.required' => 'The item status is required.',
            'status.in' => 'The item status must be one of the following: active, out_of_stock, or inactive.',
        ];
    }

}
