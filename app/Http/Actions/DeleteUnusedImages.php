<?php

namespace App\Http\Actions;

use App\Models\Bike;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class DeleteUnusedImages extends Controller {
    // metodo para borrar las fotos que se quedan colgadas en el sistema de archivos y no estan vinculadas a ninguna moto en la DB
    // usando el método mágico invoke

    public function cleanBikeDirectory(){


        $files = Storage::files('public/'.config('filesystems.bikesImageDir'));

        $total = 0;
        foreach ($files as $file) {
            $ex = explode("/" , $file);

            if( $ex[3] == 'noimage.png')
                continue;

            // comprobamos que la imagen no está en la DB
            $imageHasBike = Bike::where('image', 'like', $ex[3] )->first();
            if( $imageHasBike ) {
                continue;
            }else{
                // dd($ex);
                Storage::delete('public/'.config('filesystems.bikesImageDir').'/'.$ex[3] );
                // Storage::delete('public/'.config('filesystems.bikesImageDir').'/'.$ex[3] );
                $total++;
            }
        }

        return redirect()->back()
        ->with("success", "Limpieza del directorio de motos realizada correctamente. Se han borrado $total imagenes que no estaban en la base de datos");
    }
}
