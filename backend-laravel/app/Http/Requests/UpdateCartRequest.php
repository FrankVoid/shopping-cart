<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
            'address_id' => 'sometimes|exists:addresses,id',
            'status' => 'sometimes|in:active,completed,cancelled',
            'total_order_price' => 'sometimes|numeric|min:0',
            'shipping_cost' => 'sometimes|numeric|min:0',

        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'The customer ID is required.',
            'address_id.required' => 'The address ID is required.',
            'status.required' => 'The order status is required.',
            'status.in' => 'The status must be one of the following: active, completed, or cancelled.',
            'total_order_price.required' => 'The total order price is required.',
            'total_order_price.numeric' => 'The total order price must be a valid number.',
            'total_order_price.min' => 'The total order price cannot be less than 0.',
            'shipping_cost.required' => 'The shipping cost is required.',
            'shipping_cost.numeric' => 'The shipping cost must be a valid number.',
            'shipping_cost.min' => 'The shipping cost cannot be less than 0.',
        ];
    }
}
