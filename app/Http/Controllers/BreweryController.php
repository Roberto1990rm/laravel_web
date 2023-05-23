<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        $brewery = new Brewery();
    
        // Asignar valores de los campos del formulario
        $brewery->nombre = $request->input('nombre');
        $brewery->descripcion = $request->input('descripcion');
        $brewery->poblacion = $request->input('poblacion');
        $brewery->calle = $request->input('calle');
        $brewery->longitude = $request->input('longitude');
        $brewery->latitude = $request->input('latitude');
    
        // Guardar la imagen
        $image = $request->file('imagen');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $brewery->imagen = 'images/' . $imageName;
        }
    
        // Guardar la cervecería
        $brewery->save();
    
        // Redireccionar o realizar otras acciones después de guardar la cervecería
        // ...
    
        return redirect()->route('breweries.index');
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

    public function destroy($id)
    {
        $brewery = Brewery::find($id);
    
        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }
    
        // Eliminar la cervecería
        $brewery->delete();
    
        return redirect()->route('breweries.index')->with('message', 'Cervecería eliminada correctamente.')->with('code', 0);
    }
}
