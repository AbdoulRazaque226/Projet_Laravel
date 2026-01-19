<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePaiementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'montant_paiement' => ['required', 'numeric', 'min:1'],
            'date_paiement' => ['required', 'date'],
            'dette_id' => ['required', 'exists:dette,id'],
            'status' => ['nullable', 'in:non payé,payé,partiellement payé'],
        ];
    }
}
