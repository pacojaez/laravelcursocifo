<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiCreateBikeRequest;
use App\Http\Requests\ApiUpdateBikeRequest;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeApiController extends Controller
{

    public function index(){
        $bikes = Bike::orderBy('id', 'DESC')->get();

        return [
            'status' => 'OK',
            'total' => count($bikes),
            'results' => $bikes
        ];
    }

    public function show($id){

        $bike = Bike::find($id);

        return $bike ?
        [
            'status' => 'OK',
            'results' => [$bike]
        ]:
            response(['status' => 'NOT FOUND'], 404)
        ;
    }

    public function search( $campo= 'marca', $valor=''){
        $bikes = Bike::where($campo, 'LIKE', "%$valor%")->get();

        return [
            'status' => 'OK',
            'total' => count($bikes),
            'results' => $bikes
        ];

    }


    public function store( ApiCreateBikeRequest $request){


        $datos = $request->json()->all();

        $datos['imagen'] = NULL;
        $datos['user_id'] = NULL;

        $bike = Bike::create($datos);

        return $bike ?
        response ([
            'status' => 'OK',
            'results' => [$bike]
        ], 201):
            response([
                'status' => 'ERROR',
                'message' => "No se pudo guardar"
            ], 400)
        ;
    }

    public function update( ApiUpdateBikeRequest $request, $id){

        $bike = Bike::find($id);

        if(!$bike){
            return response(['status' => 'NOT FOUND'], 404);
        }



        $datos = $request->json()->all();

        return $bike->update($datos) ?
        response ([
            'status' => 'OK',
            'results' => [$bike]
        ], 201):
            response([
                'status' => 'ERROR',
                'message' => "No se pudo actualizar"
            ], 400)
        ;

    }

    public function delete($id){
        $bike = Bike::find($id);
        if(!$bike){
            return response(['status' => 'NOT FOUND'], 404);
        }

        return $bike->delete()?
        response ([
            'status' => 'OK',
        ]):
            response([
                'status' => 'ERROR',
                'message' => "No se pudo eliminar"
            ], 400)
        ;

    }
}
