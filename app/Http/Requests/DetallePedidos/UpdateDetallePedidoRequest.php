<?php

namespace App\Http\Requests\DetallePedidos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetallePedidoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pedido_id' => 'required|integer',
            'prenda_id' => 'required|integer',
            'cantidad' => 'required|integer|max:99'
        ];
    }
}
