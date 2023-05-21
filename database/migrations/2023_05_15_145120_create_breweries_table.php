<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'place' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $brewery = Brewery::findOrFail($id);
        $brewery->nombre = $validatedData['name'];
        $brewery->descripcion = $validatedData['description'];
        $brewery->poblacion = $validatedData['place'];
        $brewery->longitude = $validatedData['longitude'];
        $brewery->latitude = $validatedData['latitude'];
        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $id])->with('message', 'Cervecería actualizada correctamente.')->with('code', 0);
    }
}
