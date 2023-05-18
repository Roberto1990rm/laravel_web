<?php

use App\Http\Controllers\BreweryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'nombre' => 'Roberto',
        'curso' => 'HPT07'
    ]);
})->name('home');

Route::get('/cervecerias', [BreweryController::class, 'index'])->name('breweries.index');

Route::get ('/breweries/create', [BreweryController::class, 'create'])->name('breweries.create');
Route::post ('/breweries/store', [BreweryController::class, 'store'])->name('breweries.store');


Route::get('/cervecerias/{id}', [BreweryController::class, 'show'])->name('breweries.show');
Route::get('/breweries', [BreweryController::class, 'index'])->name('breweries');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



Route::get('/about', function () {
    return view('about');
})->name('about');
