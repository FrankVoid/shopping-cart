<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartItemRequest extends FormRequest
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
            'cart_id' => 'required|exists:carts,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'price_at_purchase' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name must not exceed 45 characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name must not exceed 45 characters.',
        ];
    }
}
