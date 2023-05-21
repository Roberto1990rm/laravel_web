<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brewery;

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
        $validatedData = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'description' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $brewery = Brewery::create($validatedData);

        return redirect()->route('breweries.show', ['id' => $brewery->id])->with('message', 'Cervecería creada correctamente.')->with('code', 0);
    }

    public function edit($id)
    {
        $brewery = Brewery::find($id);
        return view('breweries.edit', compact('brewery'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->nombre;
        $place = $request->poblacion;
        $description = $request->descripcion;
        $longitude = $request->longitude;
        $latitude = $request->latitude;

        try {
            DB::table('breweries')->where('id', $id)->update([
                'nombre' => $name,
                'poblacion' => $place,
                'descripcion' => $description,
                'longitude' => $longitude,
                'latitude' => $latitude,
            ]);
        } catch (RuntimeException $e) {
            return back()->with('message', 'Datos incorrectos')->with('code', 0);
        }

        return redirect()->route('breweries.show', ['id' => $id])->with('message', 'Cervecería actualizada correctamente.')->with('code', 0);
    }
}
