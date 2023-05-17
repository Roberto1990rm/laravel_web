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
Route::get('/breweries/create', 'BreweryController@create')->name('breweries.create');

Route::get('/cervecerias/{id}', [BreweryController::class, 'show'])->name('breweries.show');
Route::get('/breweries', [BreweryController::class, 'index'])->name('breweries');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/cervecerias/crear', [BreweryController::class, 'create'])->name('brewery.create');
Route::post('/cervecerias', [BreweryController::class, 'store'])->name('brewery.store');

Route::get('/about', function () {
    return view('about');
})->name('about');
