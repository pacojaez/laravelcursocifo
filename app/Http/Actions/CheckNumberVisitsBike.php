<?php

namespace App\Http\Actions;

use App\Models\Bike;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class CheckNumberVisitsBike extends Controller
{

    public function check( Bike $bike ){

        return $bike->visitas;
    }

}
