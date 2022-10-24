<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use App\Models\Bike;
use App\Models\User;

use App\Events\MoreBikes;
use Illuminate\Http\Request;
use App\Events\FirstBikeCreated;
use App\Events\OneThousandVisits;
use App\Http\Requests\BikeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Services\BikePhotoUploadService;

class BikeController
{
    public function index()
    {
        $bikes = Bike::with('user')->with('concesionario')->orderBy('id', 'ASC')->paginate(12);
        // $bikes = Bike::orderBy('id', 'ASC')->paginate(12);

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
        if( !Auth::check() )
            return view('errors.403');

        return view('bikes.create');
    }

    public function store(BikeRequest $request)
    {
        // MOVIDO A BIKEREQUEST

        // $request->validate([
        //     'marca' =>'required|max:255',
        //     'modelo' =>'required|max:255',
        //     'kms' =>'required|integer',
        //     'caballos' =>'required|max:255',
        //     'color' =>'required|max:255',
        //     'matriculada' =>'required_with:matricula',
        //     'matricula' =>'required_if:matriculada, 1|
        //                     nullable|
        //                     regex:/^\d{4}[B-Z]{3}$/i|
        //                     unique:bikes',
        //     'precio' =>'required|numeric',
        //     'image' => 'sometimes|file|image|mimes:jpg,gif,png,webp|max:2048'
        // ]);

        if( !Auth::check() )
            return view('errors.403');

        if( $request->hasFile('image') ){
            $savePhoto = BikePhotoUploadService::store($request);
            $datos = $request->except('image');
            $datos += ['image' => $savePhoto];

            if( $request->input('matricula')){
                $datos += ['matriculada' => TRUE];
            }
            $datos += ['user_id' => Auth::id() ];
            $bike = Bike::create( $datos );

            if( $request->user()->first_bike_created == 0  ){
                FirstBikeCreated::dispatch( $bike, $request->user());
                $request->user()->first_bike_created = 1;
                $request->user()->save();
            }

        }else{
            $datos = $request->except('image');
            $datos += ['image' => NULL ];
            if( $request->input('matricula')){
                $datos += ['matriculada' => TRUE];
            }

            $datos += ['user_id' => Auth::id() ];
            $bike = Bike::create( $datos );

            if( $request->user()->first_bike_created == 0  ){
                FirstBikeCreated::dispatch( $bike, $request->user());
                $request->user()->first_bike_created = 1;
                $request->user()->save();
            }
        }
        $userMaxBikes = User::with('bikes')->get()->max('bikes');

        if( $userMaxBikes->value('user_id') == $bike->user->id ){
            MoreBikes::dispatch( $bike );
        }

        return redirect()->route('bike.show', $bike)
            ->with('success' , "Moto $bike->marca $bike->modelo guardada correctamente")
            ->cookie('lastInsertId', $bike->id, 0);
    }

    public function show( Bike $bike)
    {
        DB::table('bikes')->increment('visitas', 1);

        // logica para mandar mail de felicitacion por tener mil visitas
        if( $bike->visitas == 1000 ){
            OneThousandVisits::dispatch(  $bike );
        }

        return view('bikes.show', ['bike'=>$bike]);
    }

    public function edit(Request $request, Bike $bike )
    {
        // Método que solo comprueba si la moto pertenece al usuario:
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        // if(Auth::user()->cant('update', $bike))
        $user = $request->user();

        if( $user->cant('update', $bike))
            return view('errors.403');

        return view('bikes.update', ['bike'=>$bike]);
    }

        // edit the last insert id get by Cookie
    public function editLast( )
    {
        // $bike = Bike::findOrFail($id);
        if( !Cookie::has('lastInsertId'))
            return redirect()->route('bike.create');

        $bike = Bike::findOrFail( Cookie::get('lastInsertId'));

        //Autorización con Policies:
        // if( Auth::id() != $bike->user_id )
        //     return redirect()->route('login');

        //Autorización con Policies:
        if(Auth::user()->cant('update', $bike))
            return view('errors.403');


        return view('bikes.update', ['bike'=>$bike]);
    }

    public function update(Request $request, Bike $bike)
    {
        // logica que solo comprueba que el usuario y el user_id de la moto coinciden
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        if(Auth::user()->cant('update', $bike))
            return view('errors.403');

        //Autorizacion con Policies:
        //NO FUNCIONA SACANDO EL USUARIO DE LA RELACIÓN DEL MODELO
        // $user = $bike->user();
        // if( $user->cant('update',$bike))
        //             abort(401, 'No puedes editar esta moto');

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
        if( Auth::user()->cant('delete',$bike) )
            return view('errors.403',
            [
                'mensaje' => "Estás intentando acceder a un recurso al que no tienes acceso"
            ]);

        return view('bikes.delete', ['bike'=>$bike]);
    }

    public function destroy( Bike $bike )
    {
        // METODO PARA COMPROBAR EN EL CONTROLADOR SI LA RUTA ESTÁ CORRCETAMENTE FIRMADA
        // si usamos el middleware 'signed' en la ruta ya no hace falta pasarle al controlador la request
        // if( !$request->hasValidSignature() )
        //     abort(403, 'No estas autorizado a borrar esa moto');

        // Metodo donde solo comprobamos si el id del propietario de la moto y el del auth user coinciden
        //if( Auth::id() != $bike->user_id )
        //    return view('errors.403');

        //USANDO UNA GATE PARA IMPEDIR EL BORRADO DE MOTOS POR USUARIOS QUE NO PUEDEN ACCEDER AL RECURSO
        // if(Gate::denies('borrarMoto', $bike))
        //     abort(401, 'No puedes borrar un recurso que no es tuyo');

        //Autorizacion con Policies:
        if( Auth::user()->cant('delete',$bike))
                    abort(401, 'No puedes borrar esta moto');

        //MODO DE TENER RUTAS FIRMADAS CON CLAVES QUE NO SEAN LA APP.KEY
        URL::setKeyResolver( fn() => config('app.route_key'));

        if( $bike->delete() && $bike->image ){
            // con esta linea descomentada se borrará del sistema de archivos
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
           'marca' => 'max:16',
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

    public function misMotos()
    {

        $bikes = Bike::where('user_id', 'LIKE', Auth::user()->id )->paginate(12);

        $total = count($bikes);

        $miperfil = TRUE;

        return view('bikes.list', ['bikes' => $bikes, 'total' => $total, 'miperfil' => $miperfil ]);
    }

    /**
     * Metodo para recuperar las motos borradas con SOFTDELETES
     */

     public function userTrashedBikes( ){

        if( Auth::user()->hasRoles(['SUPERADMIN'])){
            $bikes = Bike::onlyTrashed()->with('user')->paginate(12);
            $total = count(Bike::onlyTrashed()->get());
        }else{
            $bikes = Auth::user()->bikes()->onlyTrashed()->paginate(12);
            $total = count($bikes);
        }

        return view('bikes.trashed', ['bikes' => $bikes , 'total' => $total ]);
     }

     /**
      * RESTORE SOFDELETES
      */
    public function bikeRestore( int $id ){

        $bike = Bike::withTrashed()->find($id);

        if( $bike->user == NULL ){
            $bikes = Bike::with('user')->with('concesionario')->orderBy('id', 'ASC')->paginate(12);
            // $bikes = Bike::orderBy('id', 'ASC')->paginate(12);
            $total = Bike::count();

            // return view('bikes.list', ['bikes' => $bikes, 'total' => $total])
                    return back()->withErrors( ['error' => "Estás intentando restaurar una moto cuyo propietario está dado de baja"] );
        }

        $bike->restore();

        if( Auth::user()->hasRoles(['SUPERADMIN'])){
            $bikes = Bike::with('user')->with('concesionario')->orderBy('id', 'ASC')->paginate(12);

            $total = Bike::count();

            return redirect()->route('bike.index', ['bikes' => $bikes])
                ->with('success' , "Moto $bike->marca $bike->modelo restaurada en la base de datos correctamente");

        }else{
            $bikes = Bike::where('user_id', 'LIKE', Auth::user()->id )->paginate(12);

            $total = count($bikes);

            $miperfil = TRUE;

            return view('bikes.list', ['bikes' => $bikes, 'total' => $total, 'miperfil' => $miperfil ])
                ->with('success' , "Moto $bike->marca $bike->modelo restaurada en la base de datos correctamente");
        }


    }


    /**
     * Elimina la moto definitivamente y la imagen asociada a dicha moto
     *
     * @param integer $id
     * @return void
     */
    public function purgeBike ( Request $request ){

        $bike = Bike::withTrashed()->find( $request->input('bike_id'));

        if( $bike->forceDelete() && $bike->image){
            Storage::delete('public/'.config('filesystems.bikesImageDir').'/'.$bike->image );
        }

        return back()
                ->with('success' , "Moto $bike->marca $bike->modelo borrada definitivamente");
    }

}
