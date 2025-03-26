<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'card' => ['required', 'digits:16', 'numeric'],
            'card_holder' => ['required', 'string'],
            'expiration' => ['required', 'numeric', 'digits:4'],
        ];
    }

    public function messages()
    {
        return [
            'card.required' => 'El número de tarjeta es obligatorio.',
            'card.digits' => 'El número de tarjeta debe tener exactamente 16 dígitos.',
            'card.numeric' => 'El número de tarjeta solo puede contener números.',

            'card_holder.required' => 'El nombre del titular es obligatorio.',
            'card_holder.string' => 'El nombre del titular debe ser una cadena de texto válida.',

            'expiration.required' => 'La fecha de expiración es obligatoria.',
            'expiration.numeric' => 'La fecha de expiración debe ser un número.',
            'expiration.digits' => 'La fecha de expiración debe tener exactamente 4 dígitos (MMYY).',
            'amount.required' => 'El monto es obligatorio.',
            'amount.numeric' => 'El monto debe ser un número.',
        ];
    }
}
