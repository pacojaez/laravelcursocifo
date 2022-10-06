<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeUpdateRequest extends BikeRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->bike->id;
        return [
            'matricula' =>"required_if:matriculada, 1|
                            nullable|
                            regex:/^\d{4}[B-Z]{3}$/i|
                            unique:bikes,matricula, $id",
        ]+parent::rules();
    }
}
