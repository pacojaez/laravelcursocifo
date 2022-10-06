<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Mayusculas  implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (strtoupper($value) !== $value) {
            $fail('El campo :attribute debe estar en MAYÚSCULAS.');
        }
    }

    public function passes( $attribute, $value ){

        return $value == strtoupper( $value );

    }

    public function message(){
        return 'El campo :attribute debe estar en MAYÚSCULAS';
    }
}
