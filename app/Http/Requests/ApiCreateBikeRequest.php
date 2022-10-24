<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ApiCreateBikeRequest extends BikeRequest
{

    public function authorize(){
        return TRUE;
    }
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'matricula' => "required_if:matriculada, 1|nullable|regex:/^\d{4}[BCDFGHJKLMNPQRSTVWXYZ]{3}$/i|unique:bikes"
        ]+parent::rules();
    }

    protected function failedValidation( Validator $validator){

        $response = response([
            'status' => 'ERROR',
            'message' => "No se pudo validar la petición",
            'errors' => $validator->errors()
        ], 422);

        throw new ValidationException( $validator, $response);
    }
}
