<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $breweries = [
        ['id' => 1, 'nombre' => 'Uceda', 'poblacion' => 'Madrid'],
        ['id' => 2, 'nombre' => 'Dunn\'s','poblacion' => 'Barcelona'],
        ['id' => 3, 'nombre' => 'Triana', 'poblacion' => 'Sevilla'],
        ['id' => 4, 'nombre' => 'Moraima', 'poblacion' => 'Madrid'],
        ['id' => 5, 'nombre' => 'Yunque', 'poblacion' => 'Ponferrada'],
        ['id' => 6, 'nombre' => 'Tang', 'poblacion' => 'Ponferrada'],
    ];

    return view('home', ['nombre' => 'David', 'curso' => 
'HPT07', 'breweries' => $breweries]);
})->name('home');

Route::get('/cervecerias', function () { 
    $breweries = [
    ['id' => 1, 'nombre' => 'Uceda', ' poblacion' => 'Madrid'],
    ['id' => 2, 'nombre' => 'Dunn\'s','poblacion' => 'Barcelona'],
    ['id' => 3, 'nombre' => 'Triana', 'poblacion' => 'Sevilla'],
    ['id' => 4, 'nombre' => 'Moraima', 'poblacion' => 'Madrid'],
    ['id' => 5, 'nombre' => 'Yunque', 'poblacion' => 'Ponferrada'],
    ['id' => 6, 'nombre' => 'Tang', 'poblacion' => 'Ponferrada'],
];

   return view ('breweries', ['breweries' => $breweries]);
})->name('breweries');

Route::get ('/cervecerias/{id}', function ($id) { 
    $breweries = [
    ['id' => 1, 'nombre' => 'Uceda', 'poblacion' => 'Madrid'],
    ['id' => 2, 'nombre' => 'Dunn\'s','poblacion' => 'Barcelona'],
    ['id' => 3, 'nombre' => 'Triana', 'poblacion' => 'Sevilla'],
    ['id' => 4, 'nombre' => 'Moraima', 'poblacion' => 'Madrid'],
    ['id' => 5, 'nombre' => 'Yunque', 'poblacion' => 'Ponferrada'],
    ['id' => 6, 'nombre' => 'Tang', 'poblacion' => 'Ponferrada'],
];

$brewery = null;
$i = 0;
while ($i < count($breweries) && $brewery == null) {
    if ($id == $breweries[$i]['id']) { 
        $brewery = $breweries[$i];
    }
    $i++;
}


    return view('brewery', ['brewery' => $brewery]);
})->name('brewery');


Route::get('/about', function () {
    return view('home');
})->name('about');  //no consigo arreglar quienes somos.