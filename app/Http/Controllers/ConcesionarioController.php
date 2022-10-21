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
            'name' => 'required|max:30',
         ]);

         $concesionario = Concesionario::where('name', 'like', $request->input('name'))->firstOrFail();
// dd($concesionario);
        $bikes = Bike::with('user')->where( "concesionario_id", "LIKE", $concesionario->id )->get();
        $total = count($bikes);
        $bikes = Bike::where( "concesionario_id", "LIKE", $concesionario->id )->orderBy('id', 'ASC')->paginate(12)->appends(['name'=> $concesionario->name ]);

         return view('concesionario.list', ['bikes' => $bikes, 'total' => $total, 'concesionario' => $concesionario, 'name' => $concesionario->name ]);
    }
}
