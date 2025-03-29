<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'address_id' => 'required|exists:addresses,id',
            'status' => 'required|in:active,completed,cancelled',
            'total_order_price' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'cart_id.required' => 'The cart ID is required.',
            'item_id.required' => 'The item ID is required.',
            'quantity.required' => 'The item quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 0.',
        ];
    }
}
