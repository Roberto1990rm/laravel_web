<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;
use Illuminate\Support\Facades\DB;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::all();

        return view('breweries.index', compact('breweries'));
    }

    public function show($id)
    {
        $brewery = Brewery::find($id);

        return view('breweries.show', compact('brewery'));
    }

    public function create()
    {
        return view('breweries.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('nombre');
        $place = $request->input('poblacion');
        $description = $request->input('descripcion');
        $calle = $request->input('calle');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
    
        DB::table('breweries')->insert([
            'nombre' => $name,
            'poblacion' => $place,
            'descripcion' => $description,
            'calle' => $calle,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    
        $brewery = new Brewery();
        $brewery->nombre = $name;
        $brewery->poblacion = $place;
        $brewery->descripcion = $description;
        $brewery->calle = $calle;
        $brewery->latitude = $latitude;
        $brewery->longitude = $longitude;
        $brewery->save();
    
        return redirect()->route('breweries.show', ['id' => $brewery->id]);
    }
    

    public function edit($id)
    {
        $brewery = Brewery::find($id);

        return view('breweries.edit', compact('brewery'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'poblacion' => 'required',
            'calle' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $brewery = Brewery::find($id);

        $brewery->nombre = $validatedData['nombre'];
        $brewery->descripcion = $validatedData['descripcion'];
        $brewery->poblacion = $validatedData['poblacion'];
        $brewery->calle = $validatedData['calle'];
        $brewery->longitude = $validatedData['longitude'];
        $brewery->latitude = $validatedData['latitude'];

        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $id])->with('message', 'Cervecería actualizada correctamente.')->with('code', 0);
    }
}
