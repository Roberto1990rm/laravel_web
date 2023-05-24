<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreweryRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:30',
            'descripcion' => 'required|min:30',
            'poblacion' => 'required',
            'calle' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'imagen' => 'image',
            //
        ];
    }


    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre no puede estar vacío',
            'nombre.max' => 'El campo nombre no puede ser tan largo',
            'descripcion' => 'El campo descripción necesita como mínimo 20 caracteres',
            'poblacion' => 'required','El campo nombre no puede estar vacío',
            'calle' => 'required','El campo nombre no puede estar vacío',
            'longitude' => 'required','El campo nombre no puede estar vacío',
            'latitude' => 'required','El campo nombre no puede estar vacío',
            'imagen' => 'image',
            //
        ];
    }
}
