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
            'matricula' =>'max:255',
            'precio' =>'required|numeric',
            'image' => 'required|image'
        ]);

        $savePhoto = BikePhotoUploadService::store($request);

        $bike = Bike::create($request->all());
        if( $request->input('matricula')){
            $bike->matriculada = TRUE;
            $bike->update();
        }
        $bike->image = $savePhoto;
        $bike->save();

        return redirect()->route('bike.show', $bike)
            ->with('success' , "Moto $bike->marca $bike->modelo guardada correctamente");
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

    public function update(Request $request, int $id)
    {
        $request->validate([
            'marca' =>'required|max:255',
            'modelo' =>'required|max:255',
            'kms' =>'required|integer',
            'caballos' =>'required|max:255',
            'color' =>'required|max:255',
            'matricula' =>'max:255',
            'precio' =>'required|numeric',
            'image' => 'image'
        ]);

        $bike = Bike::findOrFail($id);

        if($request->exists('image')){
            $savePhoto = BikePhotoUploadService::store($request);
            $bike->image = $savePhoto;
            $bike->update();
        }

        if( $request->input('matricula')){
            $bike->matriculada = TRUE;
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

        $bike->delete();

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

    // metodo para borrar las fotos que se quedan colgadas en el sistema de archivos y no estan vinculadas a ninguna moto en la DB

    public function cleanBikeDirectory(){
        // $filesName = \File::files(base_path().'\public\img\bikes\\');
        $files = Storage::files(public_path().'/img/bikes/');
        dd($files);
        $arr = [];
        foreach ($files as $file) {
            // dd($file);
            $ex = explode("\\"  , $file);
            // array_push($arr , $ex[count($ex) - 1]);
            // comprobamos que la imagen no está en la DB
            $imageHasBike = Bike::where('image', 'like', "/img/bikes/.$ex[6]" )->first();
            if( $imageHasBike === NULL ) {
                continue;
            }else{
                // echo 'hello world';
                // File::delete();
                Storage::delete('/public/img/bikes/'.$ex[6]);
            }
        }

        return redirect()->back()
        ->with('success', 'Limpieza del directorio de motos realizada correctamente');
    }
}
