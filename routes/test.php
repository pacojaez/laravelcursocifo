<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;

Route::get('/test', function () {

    // $bikes = Bike::all();
    // $bike = $bikes->random();

    Log::emergency('Envio de mails correcto');
    Log::build([
        'driver' => 'single',
        'path' => storage_path('logs/custom.log'),
      ])->info('Something happened!');
      Log::alert('Algo pasó');
      Log::error('error');
      $config = config('app.providers');

    return view('testwelcome',  ['config' => $config ] );

})->name('testwelcome');


/**
 * RUTAS PARA TESTEAR csrf token restriction
 */

    Route::get('/testMiddleware', function(){
        $testcomponent = 'Petición por GET';
        return view('test.testMiddleware',  ['testcomponent' => $testcomponent ] );
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
        $testcomponent = "Metodo usado: ".$request->method();
        return view('test.testMiddlewareany',  ['testcomponent' => $testcomponent ] );
        // return "Metodo usado: ".$request->method();
    })->name('testMiddlewareany');

    Route::redirect('/testingMiddleware', '/testMiddleware', 301);

    Route::get('/saludar/{nombre}', function(string $nombre ){
        return "Hola $nombre";
    })->name('saludar');

    Route::get('/saludar/{nombre}/{edad}', function( string $nombre, int $edad  ){
        return "Hola $nombre, tienes $edad";
    });

/**
 * RUTAS PARA COOKIES
 */

Route::get('/addCookie', function(){
    Cookie::queue('MiCookieCookie', 'OreoChocolate', 5 );
    $testcomponent = 'F12 y mira a ver si está la cookie: MiCookieCookie con valor OreoChocolate los próximos 5 minutos<br>Pues el valor está encriptado por Laravel y no podrás ver que tiene ese valor';
    return view('test.setcookie',  ['testcomponent' => $testcomponent ] );
})->name('setcookie');

Route::get('/getCookie', function( Request $request ){
    $testcomponent = 'El valor desencriptado de la cookie es: '.$request->cookie('MiCookieCookie');
    return view('test.setcookie',  ['testcomponent' => $testcomponent ] );
    // $cookie = $request->cookie('MiCookieCookie');
    // return response ("Usando el método request->cookie('MiCookieCookie') podemos ver el valor de la Cookie. Valor de la cookie: $cookie");
})->name('getcookie');

/**
 * FALLBACK ROUTE
 */
Route::fallback([WelcomeController::class, 'index']);
