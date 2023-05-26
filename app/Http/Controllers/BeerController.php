<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beers = beer::orderBy('marca')->get();

        return view ('beers.index', compact ('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beers.create');
    }

    public function store(Request $request)
    {
        $beer = new Beer();

        // Asignar valores de los campos del formulario
        $beer->nombre = $request->input('nombre');
        $beer->descripcion = $request->input('descripcion');
        $beer->marca = $request->input('marca');
        $beer->vol = $request->input('vol');

        // Guardar la imagen
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $path = $image->store('beer_images', 'public');
            $beer->imagen = $path;
        } else {
            // Si no se proporciona una nueva imagen, asignar la imagen por defecto
            $beer->imagen = 'bar.jpg';
        }

        

        // Guardar la cervecería
        $beer->save();

        // Redireccionar o realizar otras acciones después de guardar la cervecería
        // ...

        return redirect()->route('beers.index')->with('success', 'Cerveza creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        //
        return view('beers.show', compact('beer'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $beer = Beer::find($id);

        if (!$beer) {
            return redirect()->route('beers.index')->with('message', 'Cerveza no encontrada.')->with('code', 1);
        }

        return view('beers.edit', compact('beer'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'marca' => 'required',
        'vol' => 'required',
        'imagen' => 'image',
    ]);

    $beer = Beer::find($id);

    if (!$beer) {
        return redirect()->route('beers.index')->with('message', 'Cerveza no encontrada.')->with('code', 1);
    }

    $beer->nombre = $validatedData['nombre'];
    $beer->descripcion = $validatedData['descripcion'];
    $beer->marca = $validatedData['marca'];
    $beer->vol = $validatedData['vol'];

    // Almacenar la nueva imagen solo si se proporciona una
    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');

        // Eliminar la imagen anterior si existe
        if ($beer->imagen) {
            Storage::disk('public')->delete('beer_images/' . $beer->imagen);
        }

        $path = $image->store('beer_images', 'public');
        $beer->imagen = $path;
    }

    $beer->save();

    return redirect()->route('beers.show', ['id' => $id])->with('success', 'Cerveza actualizada correctamente.');
}


public function destroy($id)
{
    $beer = Beer::find($id);

    if (!$beer) {
        return redirect()->route('beers.index')->with('message', 'Cerveza no encontrada.')->with('code', 1);
    }

    // Eliminar la imagen si existe
    if ($beer->imagen) {
        Storage::disk('public')->delete('beer_images/' . $beer->imagen);
    }

    // Eliminar la cervecería
    $beer->delete();

    return redirect()->route('beers.index')->with('success', 'Cerveza eliminada correctamente.');
}

}