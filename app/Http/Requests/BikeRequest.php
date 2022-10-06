<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'marca' =>'required|max:255',
            'modelo' =>'required|max:255',
            'kms' =>'required|integer',
            'caballos' =>'required|max:255',
            'color' =>'required|max:255',
            'matriculada' =>'required_with:matricula',
            'matricula' =>'required_if:matriculada, 1|
                            nullable|
                            regex:/^\d{4}[B-Z]{3}$/i|
                            unique:bikes',
            'precio' =>'required|numeric',
            'image' => 'sometimes|file|image|mimes:jpg,gif,png,webp|max:2048'
        ];
    }

    public function messages()
        {
        return [
        'matricula.required' => 'Debes poner la matrícula de la moto',
        'color.required' => 'Debe de ser un color incluido en el arco iris',
        ];
        }
}
