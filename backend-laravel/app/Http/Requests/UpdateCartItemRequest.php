<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartItemRequest extends FormRequest
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
            'cart_id' => 'sometimes|exists:carts,id',
            'item_id' => 'sometimes|exists:items,id',
            'quantity' => 'sometimes|integer|min:1',
            'price_at_purchase' => 'sometimes|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'cart_id.exists' => 'The selected cart does not exist.',
            'item_id.exists' => 'The selected item does not exist.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'price_at_purchase.numeric' => 'The price at purchase must be a number.',
            'price_at_purchase.min' => 'The price at purchase must be at least 0.',
        ];
    }
}
