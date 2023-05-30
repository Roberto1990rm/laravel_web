<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\BreweryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


Route::get('home', function () {
    return view('home', [
        'nombre' => 'Roberto',
        'curso' => 'HPT07'
    ]);
})->name('home');


Route::get('/', function() {
    return redirect()->route('home');
})->name('root'); // Cambia el nombre de esta ruta a 'root'


Route::get('/cervecerias', [BreweryController::class, 'index'])->name('breweries.index');
Route::get('/cervecerías/mispropuestas', [BreweryController::class, 'proposals'])->name('breweries.proposals');


Route::group(['middleware' => 'auth'], function () {
    
Route::get('/cervecerias/create', [BreweryController::class, 'create'])->name('breweries.create');
Route::post('/cervecerias/store', [BreweryController::class, 'store'])->name('breweries.store');
Route::get('/cervecerias/edit/{id}', [BreweryController::class, 'edit'])->name('breweries.edit');
Route::post('/cervecerias/update/{id}', [BreweryController::class, 'update'])->name('breweries.update');
Route::delete('/breweries/{id}', [BreweryController::class, 'destroy'])->name('breweries.destroy');//si es incorrecta es destoy más abajo comentada.
});

Route::get('/cervecerias/{id}', [BreweryController::class, 'show'])->name('breweries.show');


Route::resource('/beers', BeerController::class)->parameters(["beers"]);

Route::get('/beers/create', [BeerController::class, 'create'])->name('beers.create');
Route::post('/beers/store', [BeerController::class, 'store'])->name('beers.store');
Route::get('/beers/edit/{id}', [BeerController::class, 'edit'])->name('beers.edit');
Route::put('/beers/update/{id}', [BeerController::class, 'update'])->name('beers.update');

Route::delete('/beers/{id}', [BeerController::class, 'destroy'])->name('beers.destroy');


Route::get('/beers/{id}', [BeerController::class, 'show'])->name('beers.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/about', function () {
    return view('about');
})->name('about');
Auth::routes();

//Route::delete('/breweries/{id}', [BreweryController::class, 'destroy'])->name('breweries.destroy');
//Route::get('/breweries/{id}/edit', [BreweryController::class, 'edit'])->name('breweries.edit');
//Route::put('/breweries/{id}', [BreweryController::class, 'update'])->name('breweries.update');

//Route::get('breweries.json', [BreweryController::class, 'json'])->name('breweries.json');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');