<?php

namespace App\Http\Requests\Pedidos;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
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
            'mail_cliente' => 'required|email:rfc',
            'monto' => ['required','numeric','regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'prendas' => 'required|array|min:1',
            'prendas.*.id' => 'required|exists:prendas,id',
            'prendas.*.cantidad' => 'required|numeric|min:1'
        ];
    }   

    public function messages()
    {
        return [
            'monto.regex' => 'The :attribute must have a maximum of 10 digits in the integer part and 2 digits in the decimal part '
        ];
    }
}
