<?php

namespace App\Http\Requests\Prendas;

use Illuminate\Foundation\Http\FormRequest;

class StorePrendaRequest extends FormRequest
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
            'nombre'=>'required|string|max:100|unique:prendas',
            'talle'=>'required|string|max:2',
            'color'=>'required|string|max:30',
            'imagen'=>'required',
            'precio'=>'required|decimal:2',
            'descripcion'=>'required|text|max:1000'
        ];
    }
}
