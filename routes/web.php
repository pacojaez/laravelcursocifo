<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Bike;
use Illuminate\Http\Request;

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


Route::get('/clearcache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCodeView = Artisan::call('view:clear');
    $optimizeClear = Artisan::call('optimize:clear');
    return view('components.cachecleared');
})->name('clearcache');

Route::match(['GET', 'POST'], '/bikesearch', [BikeController::class, 'search'])->name('bike.search');
// Route::resource('bike', BikeController::class);
Route::get('/bike', [BikeController::class, 'index'])->name('bike.index');
Route::get('/bike/create', [BikeController::class, 'create'])->name('bike.create');
Route::get('/bike/show/{bike}', [BikeController::class, 'show'])->name('bike.show');
Route::get('/bike/delete/{bike}', [BikeController::class, 'delete'])->name('bike.delete');
Route::post('/bike', [BikeController::class, 'store'])->name('bike.store');
Route::get('/bike/{bike}/edit', [BikeController::class, 'edit'])->name('bike.edit');
Route::put('/bike/{bike}', [BikeController::class, 'update'])->name('bike.update');
Route::delete('/bike/{bike}', [BikeController::class, 'destroy'])->name('bike.destroy');




Route::get('/installation', function(){
    return view('installation');
})->name('installation');

Route::get('/bladedirectives', function(){
    return view('bladedirectives');
})->name('bladedirectives');

Route::get('/routing', function(){
    return view('routing');
})->name('routing');



/**
 * RUTAS PARA TESTEAR csrf token restriction
 */

//  Route::get('/testMiddleware', function(){
//     return 'Petición por GET';
//  });
//  Route::post('/testMiddleware', function(){
//     return 'Petición por POST';
//  });
//  Route::put('/testMiddleware', function(){
//     return 'Petición por PUT';
//  });
//  Route::delete('/testMiddleware', function(){
//     return 'Petición por DELETE';
//  });


// Route::any('/testMiddleware', function( Request $request ){
//     return "Metodo usado: ".$request->method();
// });

// Route::redirect('/testingMiddleware', '/testMiddleware', 301);


// Route::get('/saludar/{nombre}', function(string $nombre ){
//     return "Hola $nombre";
// });
// Route::get('/saludar/{nombre}/{edad}', function( string $nombre, int $edad  ){
//     return "Hola $nombre, tienes $edad";
// });

// Route::get('/ver/portada', [ WelcomeController::class, 'index'] );
// Route::get('/ver/{bike}', [ BikeController::class, 'show' ]);

/**
 * FALLBACK ROUTE
 */
Route::fallback([WelcomeController::class, 'index']);
