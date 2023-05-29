<?php

namespace App\Http\Controllers;


use App\Http\Requests\BreweryRequest;
use Illuminate\Http\Request;
use App\Models\Brewery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class BreweryController extends Controller
{



    
    public function index()
{
    $breweries = Brewery::orderBy('nombre')->get();
    foreach ($breweries as $brewery) {
        if (empty($brewery->imagen)) {
            $brewery->imagen = asset('storage/bar.jpg'); // Ruta 
        }
    }
    return view('breweries.index', compact('breweries'));
}
    

public function proposals()
{
    $user = Auth::user();
    $breweries = Brewery::where('user_id', $user->id)->get();
    return view('breweries.index', ['breweries' => $breweries]);
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

    public function store(BreweryRequest $request)
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
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $path = $image->store('brewery_images', 'public');
            $brewery->imagen = $path;
        } else {
            // Si no se proporciona una nueva imagen, asignar la imagen por defecto
            $brewery->imagen = 'bar.jpg';
        }

        $brewery->user_id = Auth::id();

        // Guardar la cervecería
        $brewery->save();

        // Redireccionar o realizar otras acciones después de guardar la cervecería
        // ...

        return redirect()->route('breweries.index')->with('success', 'Cervecería creada correctamente.');
    }

    public function edit($id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }

        return view('breweries.edit', compact('brewery'));
    }

    public function update(BreweryRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'poblacion' => 'required',
            'calle' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'imagen' => 'image',
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

        // Almacenar la nueva imagen solo si se proporciona una
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');

            // Eliminar la imagen anterior si existe
            if ($brewery->imagen) {
                Storage::delete('public/' . $brewery->imagen);
            }

            $path = $image->store('brewery_images', 'public');
            $brewery->imagen = $path;
        }

        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $id])->with('success', 'Cervecería actualizada correctamente.');
    }


    public function destroy($id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }

        // Eliminar la imagen si existe
        if ($brewery->imagen) {
            Storage::delete('public/' . $brewery->imagen);
        }

        // Eliminar la cervecería
        $brewery->delete();

        return redirect()->route('breweries.index')->with('success', 'Cervecería eliminada correctamente.');
    }

    /**public function json()
{
    $breweries = Brewery::all();
    return response()->json($breweries);
}*/





}


