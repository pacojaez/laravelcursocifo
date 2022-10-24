<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiUpdateBikeRequest extends ApiCreateBikeRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'matricula' => "required_if:matriculada, 1|nullable|regex:/^\d{4}[BCDFGHJKLMNPQRSTVWXYZ]{3}$/i|unique:bikes,matricula, $id"
        ]+parent::rules();
    }
}
