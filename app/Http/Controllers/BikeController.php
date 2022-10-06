<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use App\Services\BikePhotoUploadService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BikeController
{
    public function index()
    {
        $bikes = Bike::orderBy('id', 'ASC')->paginate(12);

        $total = Bike::count();

        return view('bikes.list', ['bikes' => $bikes, 'total' => $total]);
    }

    // public function create()
    // {
    //     dd('Hello');
    //     return view('bikes.create');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('?hello');
        return view('bikes.create');
    }

    public function store(Request $request)
    {

        $request->validate([
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
        ]);


        if( $request->hasFile('image') ){
            $savePhoto = BikePhotoUploadService::store($request);
            $datos = $request->except('image');
            $datos += ['image' => $savePhoto];

            if( $request->input('matricula')){
                $datos += ['matriculada' => TRUE];
            }
            $bike = Bike::create( $datos );
        }else{
            $datos = $request->except('image');
            $datos += ['image' => 'noimage.png'];
            if( $request->input('matricula')){
                $datos += ['matriculada' => TRUE];
            }
            $bike = Bike::create( $datos );
        }

        return redirect()->route('bike.show', $bike)
            ->with('success' , "Moto $bike->marca $bike->modelo guardada correctamente")
            ->cookie('lastInsertId', $bike->id, 0);
    }

    public function show( Bike $bike)
    {
// dd($bike);
        return view('bikes.show', ['bike'=>$bike]);
    }

    public function edit(Bike $bike )
    {
        // $bike = Bike::findOrFail($id);

        return view('bikes.update', ['bike'=>$bike]);
    }

        // edit the last insert id get by Cookie
    public function editLast( )
    {
        // $bike = Bike::findOrFail($id);
        if( !Cookie::has('lastInsertId'))
            return redirect()->route('bike.create');

        $bike = Bike::findOrFail( Cookie::get('lastInsertId'));
        return view('bikes.update', ['bike'=>$bike]);
    }

    public function update(Request $request, Bike $bike)
    {

        $request->validate([
            'marca' =>'required|max:255',
            'modelo' =>'required|max:255',
            'kms' =>'required|integer',
            'caballos' =>'required|max:255',
            'color' =>'required|max:255',
            'matriculada' =>'required_with:matricula',
            'matricula' =>"required_if:matriculada, 1|
                            nullable|
                            regex:/^\d{4}[B-Z]{3}$/i|
                            unique:bikes,matricula, $bike->id",
            'precio' =>'required|numeric',
            'image' => 'sometimes|file|image|mimes:jpg,gif,png,webp|max:2048'
        ]);

        if($request->exists('image')){
            $savePhoto = BikePhotoUploadService::store($request);
            $bike->image = $savePhoto;
            $bike->update();
        }

        if( $request->input('matricula')){
            $bike->matriculada = TRUE;
            $bike->update();
        }

        if($request->filled('eliminarImagen') && $bike->image ){
            Storage::delete( 'public/'.config('filesystems.bikesImageDir').'/'.$bike->image );
            $bike->image = NULL;
            $bike->update();
        }

        $bike->update($request->only('marca', 'modelo', 'kms', 'caballos', 'color', 'matricula', 'precio'));
        //TO DO BORRAR FOTO ANTIGUA DEL SISTEMA DE ARCHIVOS

        return back()
                ->with('success' , "Moto $bike->marca $bike->modelo actualizada correctamente")
                ->cookie('lastInsertId', $bike->id, 0 );
    }

    public function delete( Bike $bike)
    {
        return view('bikes.delete', ['bike'=>$bike]);
    }

    public function destroy( Bike $bike )
    {
        //METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        URL::setKeyResolver( fn() => config('app.route_key'));

        if( $bike->delete() && $bike->image ){
            // con esta linea desocmentada se borrará del sistema de archivos
            // pero como usamos SoftDeletes podemos volver a querer usar la foto en el futuro por lo que
            // esta linea se queda comentada
            // Storage::delete('public/'.config('filesystems.bikesImageDir').'/'.$bike->image );
        }

        return redirect()->route('bike.index')
                ->with('success' , "Moto $bike->marca $bike->modelo borrada correctamente");
    }

    /**
     * search method by marca and modelo
     */
    public function search( Request $request ){

        $request->validate([
           'marca' => 'required|max:16',
           'modelo' => 'max:16'
        ]);

        $marca = $request->input('marca');
        $modelo  = $request->input('modelo');

        $bikes = Bike::where( "marca", "LIKE", "%$marca%")
                ->where('modelo', "LIKE", "%$modelo%")->get();

        $total = count($bikes);

        $bikes = Bike::where( "marca", "LIKE", "%$marca%")
                        ->where('modelo', "LIKE", "%$modelo%")
                        ->paginate(12)
                        ->appends(['marca'=> $marca, 'modelo' => $modelo ]);

        return view('bikes.list', ['bikes' => $bikes, 'total' => $total, 'marca'=> $marca, 'modelo' => $modelo]);
    }

}
