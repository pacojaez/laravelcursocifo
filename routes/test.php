<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {

    $bikes = Bike::all();
    $bike = $bikes->random();

    Log::emergency('Envio de mails correcto');
    Log::build([
        'driver' => 'single',
        'path' => storage_path('logs/custom.log'),
      ])->info('Something happened!');
      Log::alert('Algo pasó');
      Log::error('error');
      $config = config('app.providers');

    return view('welcome',  ['config' => $config, 'bike' => $bike ] );

})->name('welcome');


/**
 * RUTAS PARA TESTEAR csrf token restriction
 */

    Route::get('/testMiddleware', function(){
        return 'Petición por GET';
     })->name('testMiddleware');
     Route::post('/testMiddleware', function(){
        return 'Petición por POST';
     });
     Route::put('/testMiddleware', function(){
        return 'Petición por PUT';
     });
     Route::delete('/testMiddleware', function(){
        return 'Petición por DELETE';
     });

    Route::any('/testMiddlewareany', function( Request $request ){
        return "Metodo usado: ".$request->method();
    });

    Route::redirect('/testingMiddleware', '/testMiddleware', 301);

    Route::get('/saludar/{nombre}', function(string $nombre ){
        return "Hola $nombre";
    });
    Route::get('/saludar/{nombre}/{edad}', function( string $nombre, int $edad  ){
        return "Hola $nombre, tienes $edad";
    });

/**
 * FALLBACK ROUTE
 */
Route::fallback([WelcomeController::class, 'index']);
