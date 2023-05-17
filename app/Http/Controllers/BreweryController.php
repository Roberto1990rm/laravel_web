<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::all();

        return view('breweries.index', ['breweries' => $breweries]);
    }

    public function show($id)
    {
        $brewery = Brewery::find($id);

        return view('breweries.show', ['brewery' => $brewery]);
    }

    public function create()
    {
        return view('breweries.create');
    }

    public function store(Request $request){
        //dd($request->all());
    $name = $request ->name;
    $place = $request ->place;
    $description = $request->description;
    $longitude = $request->longitude;
    $latitude = $request->latitude;

    DB::table('breweries')->insert([
        'nombre' => $name,
        'poblacion' => $place,
        'descripcion' => $description,
        'longitude' => $longitude,
        'latitude' => $latitude,
    ]);
    

    return redirect()->route('breweries')->with ('message','a')->with('code', 0);
 }
}
