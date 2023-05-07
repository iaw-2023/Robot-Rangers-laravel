<?php

namespace App\Http\Requests\Marcas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMarcaRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('marcas')->ignore($this->marca->id),
            ],
            'imagen' => 'required',//['required|mimes:jpg,png,jpeg', 'max:5048'],
            'descripcion' => 'required|string|max:1000'
        ];
    }
}
