<?php

namespace App\Http\Requests\Prendas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nombre'=>'required|string|max:100',
            'marca_id'=> ['required', Rule::exists('marcas', 'id')],
            'categoria_id'=> ['required', Rule::exists('categorias', 'id')],
            'talle'=>['required','in:xs,s,m,l,xl'],
            'color'=>'required|string|max:30',
            'imagen'=>'required|url',
            'precio'=>['required','numeric','regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'descripcion'=>'required|string|max:1000'
        ];
        
    }
    public function messages()
    {
        return [
            'precio.regex' => 'The :attribute must have a maximum of 6 digits in the integer part and 2 digits in the decimal part '
        ];
    }
}
