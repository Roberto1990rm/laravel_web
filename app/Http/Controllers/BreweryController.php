<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            // Agrega aquí las validaciones para los demás campos de la cervecería
        ]);

        $brewery = new Brewery();
        $brewery->nombre = $validatedData['nombre'];
        // Asigna los demás campos de la cervecería según corresponda
        // ...

        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $brewery->id]);
    }
}
