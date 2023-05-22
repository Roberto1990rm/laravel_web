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
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'poblacion' => 'required',
            'calle' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $brewery = new Brewery();
        $brewery->nombre = $validatedData['nombre'];
        $brewery->descripcion = $validatedData['descripcion'];
        $brewery->poblacion = $validatedData['poblacion'];
        $brewery->calle = $validatedData['calle'];
        $brewery->longitude = $validatedData['longitude'];
        $brewery->latitude = $validatedData['latitude'];
        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $brewery->id])->with('message', 'Cervecería creada correctamente.')->with('code', 0);
    }

    public function edit($id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }

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

        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }

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
