<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use App\Services\BikePhotoUploadService;

class BikeController
{
    public function index()
    {
        $bikes = Bike::orderBy('id', 'ASC')->paginate(12);

        $total = Bike::count();

        return view('bikes.list', ['bikes' => $bikes, 'total' => $total]);
    }

    public function create()
    {

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
        $bike->image = $savePhoto;
        $bike->save();

        return redirect()->route('bike.show', $bike->id)
            ->with('success' , "Moto $bike->marca $bike->modelo guardada correctamente");
    }

    public function show(int $id)
    {

        $bike = Bike::findOrFail($id);

        return view('bikes.show', ['bike'=>$bike]);
    }

    public function edit(int $id)
    {
        $bike = Bike::findOrFail($id);

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
        $bike->update($request->only('marca', 'modelo', 'kms', 'caballos', 'color', 'matricula', 'precio'));
        //TO DO BORRAR FOTO ANTIGUA DEL SISTEMA DE ARCHIVOS


        return back()
                ->with('success' , "Moto $bike->marca $bike->modelo actualizada correctamente");
    }

    public function destroy(Bike $bike )
    {

         $bike->delete();

        return back()
        ->with('success' , "Moto $bike->marca $bike->modelo borrada correctamente");
    }
}
