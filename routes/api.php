<?php

use App\Http\Controllers\BikeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bike;
use App\Models\Concesionario;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// ruta que solo se puede usar desde Firefox gracias al middleware FireFoxRules
Route::get('/bikesfirefoxjson', function(){
    $json = json_encode(Bike::orderBy('id', 'DESC')->get());

    return response($json)->header('Content-Type', 'application/json');
})->middleware('firefoxrules')->name('firefoxrules');


// ruta que solo se puede usar desde Firefox gracias al middleware FireFoxRules
Route::get('/bikes', function(){
    $json = json_encode(Bike::orderBy('id', 'DESC')->get());

    return response($json)->header('Content-Type', 'application/json');
})->name('allbikes');


// ruta que nos da las marcas de las motos
Route::get('/marcasbikes', function(){
    // dd( Bike::select('marca')->groupBy('marca')->get() );
    $json = json_encode( Bike::select( 'marca' )->groupBy('marca')->get());
    // dd($json);
    return response($json)->header('Content-Type', 'application/json');
})->name('marcasbikes');


// ruta que nos da lOS CONCESIOANRIOS
Route::get('/concesionarios', function(){
    // dd( Bike::select('marca')->groupBy('marca')->get() );
    $json = json_encode( Concesionario::select( 'name' )->get());
    // dd($json);
    return response($json)->header('Content-Type', 'application/json');
})->name('concesionarios');

/**
 * rutas API MOTOS
 */
Route::get( '/motos', [BikeApiController::class, 'index']);
Route::get('/moto/{bike}', [BikeApiController::class, 'show'])->where('bike', '^\d+$');
Route::get('/moto/{campo}/{valor}', [BikeApiController::class, 'search'])->where('campo', '^marca|modelo|matricula$');
Route::post('/moto', [BikeApiController::class, 'store']);
Route::put('/moto/update/{id}', [BikeApiController::class, 'update']);
Route::delete('/moto/delete/{id}', [BikeApiController::class, 'delete']);
/**
 * FALLBACK ROUTE
 */
Route::fallback(function(){
    return response(['status' => 'BAD REQUEST'], 400);
});
