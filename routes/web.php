<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Models\Bike;

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


Route::resource('bike', BikeController::class);


