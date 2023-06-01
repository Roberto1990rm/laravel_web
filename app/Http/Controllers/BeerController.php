<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeerRequest;
use App\Models\Beer;
use App\Models\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
class BeerController extends Controller
{
    public function index()
    {
        Paginator::useBootstrapFive();
        $beers = Beer::orderBy('marca')->paginate(3);
        return view('beers.index', compact('beers'));
    }

    public function create()
    {
        if (Auth::check()) {
            $breweries = Brewery::orderBy('nombre')->get();
            return view('beers.create', compact('breweries'));
        } else {
            return redirect()->route('beers.index');
        }
    }

    public function store(BeerRequest $request)
    {
        $beer = new Beer();
        $beer->marca = $request->input('marca');
        $beer->nombre = $request->input('nombre');
        $beer->vol = $request->input('vol');
        $beer->precio = $request->input('precio');
        $beer->descripcion = $request->input('descripcion');
        $beer->user_id = Auth::id();

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $path = $image->store('beer_images', 'public');
            $beer->imagen = $path;
        } else {
            $beer->imagen = 'bar.jpg';
        }

        $beer->save();

        $breweries = $request->input('breweries');
        //dd($breweries);
        $beer->breweries()->attach($breweries);

        return redirect()->route('beers.index')->with('success', 'La cerveza se ha creado correctamente.');
    }

    public function show(Beer $beer)
    {
        $endpoint = 'https://api.frankfurter.app';
        $operation = '/latest';
        $params = [
            'amount' => $beer->precio,
            'from' => 'EUR',
            'to' => 'JPY,USD,GBP,MXN'
        ];
        
        $response = Http::withoutVerifying()->get($endpoint . $operation, $params);

        if ($response->failed()) {
            // Manejo de errores de la solicitud HTTP
            // ...
        }

        $exchange = $response->json()['rates'];

        return view('beers.show', compact('beer', 'exchange'));
    }
    
    public function edit($id)
    {
        $beer = Beer::findOrFail($id);
        $breweries = Brewery::all(); // Obtener todas las cervecerías
    
        return view('beers.edit', compact('beer', 'breweries'));
    }
    
    public function update(Request $request, $id)
{
    $beer = Beer::findOrFail($id);
    $beer->nombre = $request->input('nombre');
    $beer->descripcion = $request->input('descripcion');
    $beer->marca = $request->input('marca');
    $beer->precio = $request->input('precio');

    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');

        if ($beer->imagen) {
            Storage::disk('public')->delete('beer_images/' . $beer->imagen);
        }

        $path = $image->store('beer_images', 'public');
        $beer->imagen = $path;
    }

    $beer->save();

    // Actualizar las cervecerías asociadas
    $selectedBreweries = $request->input('breweries', []);
    $beer->breweries()->sync($selectedBreweries);

    return redirect()->route('beers.show', ['id' => $beer->id])->with('success', 'Cerveza actualizada correctamente.');
}



    public function destroy($id)
    {
        $beer = Beer::find($id);

        if (!$beer) {
            return redirect()->route('beers.index')->with('message', 'Cerveza no encontrada.')->with('code', 1);
        }

        if ($beer->imagen) {
            Storage::disk('public')->delete('beer_images/' . $beer->imagen);
        }

        $beer->delete();

        return redirect()->route('beers.index')->with('success', 'Cerveza eliminada correctamente.');
    }
    
}
