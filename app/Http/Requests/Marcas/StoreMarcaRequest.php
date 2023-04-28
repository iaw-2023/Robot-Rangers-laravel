<?php

namespace App\Http\Requests\Marcas;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarcaRequest extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'imagen' => ['required|mimes:jpg,png,jpeg', 'max:5048'],
            'descripcion' => 'required|string|max:1000'
        ];
    }
}