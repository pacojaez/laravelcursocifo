<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use App\Models\Concesionario;

class ConcesionarioController
{
    public function concesionarioBikes( Request $request )
    {
        $request->validate([
            'name' => 'required|max:16',
         ]);

         $concesionario = Concesionario::where('name', 'like', $request->input('name'))->first();

         $bikes = Bike::where( "concesionario_id", "LIKE", $concesionario->id )->get();

         $total = count($bikes);

         $bikes = Bike::with('user')->with('concesionario')->where( "concesionario_id", "LIKE", $concesionario->id )->paginate(12);

         return view('bikes.list', ['bikes' => $bikes, 'total' => $total, 'marca'=> '', 'modelo' => '']);
    }
}
