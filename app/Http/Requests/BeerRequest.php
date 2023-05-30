<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeerRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia esto según tu lógica de autorización
    }

    public function rules()
    {
        return [
            'marca' => 'required',
            'nombre' => 'required',
            'vol' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image',
        ];
    }
}
