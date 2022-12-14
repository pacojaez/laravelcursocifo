<?php

use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Actions\DeleteUnusedImages;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ConcesionarioController;



//****************** RUTA HOME **********************************/
Route::get('/', function () {

    $bikes = Bike::all();
    $bike = $bikes->random();

    return view('welcome',  [ 'bike' => $bike ] );

})->name('welcome');
//****************** FIN RUTA  **********************************/

//****************** RUTA OPTIMIZE:CLEAR **********************************/
Route::get('/clearcache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return view('components.cachecleared');
})->name('clearcache')->middleware('isAdmin');
//****************** FIN RUTA **********************************/

//****************** GRUPO DE RUTAS ABIERTAS SIN MIDDLEWARE **********************************/

Route::match(['GET', 'POST'], '/bikesearch', [BikeController::class, 'search'])->name('bike.search');
// Route::resource('bike', BikeController::class);
Route::get('/bike', [BikeController::class, 'index'])->name('bike.index');
// Route::get('/bike/create', [BikeController::class, 'create'])->name('bike.create');
Route::get('/bike/show/{bike}', [BikeController::class, 'show'])->name('bike.show');
// Route::get('/bike/delete/{bike}', [BikeController::class, 'delete'])->name('bike.delete');
// Route::post('/bike', [BikeController::class, 'store'])->name('bike.store');
// Route::get('/bike/{bike}/edit', [BikeController::class, 'edit'])->name('bike.edit');
// Route::put('/bike/{bike}', [BikeController::class, 'update'])->name('bike.update');
// Route::delete('/bike/{bike}', [BikeController::class, 'destroy'])->name('bike.destroy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('email.contact');

Route::get('/concesionario', [ConcesionarioController::class, 'concesionarioBikes'])->name('concesionario.bikes');


//****************** FIN GRUPO **********************************/

//****************** GRUPO DE RUTAS PARA A??ADIR ->middleware('isAdmin) **********************************/
Route::prefix('admin')->middleware('auth', 'isAdmin')->group( function(){

    Route::get('/userRestore/{id}', [UserController::class, 'userRestore'])->name('user.restore');
    Route::delete('/userpurge/{id}', [UserController::class, 'purgeUser'])->name('user.purge');
    Route::get('/trashedUsers', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/role/destroy/{roleid}/{userid}', [UserController::class, 'removeRole'])->name('user.removeRole');
    Route::get('/bike/cleanBikeDirectory', [ DeleteUnusedImages::class, 'cleanBikeDirectory' ])->name('bike.cleanBikeDirectory');

});

//****************** FIN GRUPO **********************************/

//****************** GRUPO DE RUTAS PARA A??ADIR ->middleware('isAdmin) **********************************/
Route::prefix('admin')->middleware('auth')->group( function(){


    Route::get('/bike/create', [BikeController::class, 'create'])->name('bike.create')->middleware('adult');
    Route::get('/bike/delete/{bike}', [BikeController::class, 'delete'])->name('bike.delete');
    Route::post('/bike', [BikeController::class, 'store'])->name('bike.store');
    Route::get('/bike/{bike}/edit', [BikeController::class, 'edit'])->name('bike.edit');
    Route::get('/bike/editLast', [BikeController::class, 'editLast'])->name('bike.editLast');
    Route::put('/bike/{bike}', [BikeController::class, 'update'])->name('bike.update');
    Route::delete('/bike/{bike}', [BikeController::class, 'destroy'])->name('bike.destroy')->middleware('signed');
    // Route::get('/bike/cleanBikeDirectory', [ DeleteUnusedImages::class, 'cleanBikeDirectory' ])->name('bike.cleanBikeDirectory');
    Route::get('/mybikes', [BikeController::class, 'misMotos'])->name('bike.myBikes');
    Route::get('/bike/userTrashed/{user}', [BikeController::class, 'userTrashedBikes'])->name('userTrashedBikes');
    Route::get('/bikeRestore/{id}', [BikeController::class, 'bikeRestore'])->name('bike.restore');
    Route::delete('/bikepurge/{id}', [BikeController::class, 'purgeBike'])->name('bike.purge');

    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.list')->middleware('auth');
    // Route::get('/trashedUsers', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{user}', [UserController::class, 'update'])->name('user.update');
    // Route::get('/userRestore/{id}', [UserController::class, 'userRestore'])->name('user.restore');
    // Route::delete('/userpurge/{id}', [UserController::class, 'purgeUser'])->name('user.purge');
    // Route::get('/role/destroy/{roleid}/{userid}', [UserController::class, 'removeRole'])->name('user.removeRole');

});
//****************** FIN GRUPO **********************************/

//****************** GRUPO DE RUTAS ABIERTAS DE LA INSTALACI??N **********************************/
Route::get('/installation', function(){
    return view('installation');
})->name('installation');

Route::get('/bladedirectives', function(){
    return view('bladedirectives');
})->name('bladedirectives');

Route::get('/routing', function(){
    return view('routing');
})->name('routing');

Route::get('/middleware', function(){
    return view('middleware');
})->name('middleware');

Route::get('/url', function(){
    return view('url');
})->name('url');

Route::get('generatecustomkey', function(){
    return Bike::all();
})->name('generatecustomkey')->middleware(['signed']);

Route::get('/customkeysignedroutes', function(){
    return view('customkeysignedroutes');
})->name('customkeysignedroutes');

Route::get('/generararchivoroutestest', function(){
    return view('generararchivoroutestest');
})->name('generararchivoroutestest');

Route::get('/validation', function(){
    return view('validation');
})->name('validation');

Route::get('/formrequest', function(){
    return view('formrequest');
})->name('formrequest');

Route::get('/autorizacion', function(){
    return view('autorizacion');
})->name('autorizacion');

Route::get('/artisancommands', function(){
    return view('artisancommands');
})->name('artisancommands');

Route::get('/querybuilder', function(){
    return view('querybuilder');
})->name('querybuilder');

Route::get('/eloquent', function(){
    return view('eloquent');
})->name('eloquent');

Route::get('/eloquentrelations', function(){
    return view('eloquentrelations');
})->name('eloquentrelations');

//****************** FIN GRUPO **********************************/
/**
 * FALLBACK ROUTE
 */
Route::fallback([WelcomeController::class, 'index']);

require __DIR__.'/auth.php';
