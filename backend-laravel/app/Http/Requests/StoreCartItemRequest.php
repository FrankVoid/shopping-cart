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
            'cart_id.required' => 'The cart ID is required.',
            'cart_id.exists' => 'The cart ID must exist in the carts table.',
            'item_id.required' => 'The item ID is required.',
            'item_id.exists' => 'The item ID must exist in the items table.',
            'quantity.required' => 'The item quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'price_at_purchase.required' => 'The price at purchase is required.',
            'price_at_purchase.numeric' => 'The price at purchase must be a number.',
            'price_at_purchase.min' => 'The price at purchase must be at least 0.',
        ];
    }
}
