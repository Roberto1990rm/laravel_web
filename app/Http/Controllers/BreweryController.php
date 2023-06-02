<?php

namespace App\Http\Controllers;


use App\Http\Requests\BreweryRequest;
use Illuminate\Http\Request;
use App\Models\Brewery;
use App\Models\Beer;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Collection;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::orderBy('nombre')->get();

        foreach ($breweries as $brewery) {
            if (empty($brewery->imagen)) {
                $brewery->imagen = asset('storage/bar.jpg');
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
        $brewery = Brewery::findOrFail($id);
        $beers = $brewery->beers()->get();
        $badges = $beers->pluck('nombre')->toArray();

        return view('breweries.show', compact('brewery', 'badges'));
    }

    public function create()
    {
        if (Auth::check()) {
            $beers = Beer::orderBy('nombre')->get();
            return view('breweries.create', compact('beers'));
        } else {
            return redirect()->route('beers.index');
        }
    }

    public function store(BreweryRequest $request)
{
    $brewery = new Brewery();
    $brewery->nombre = $request->input('nombre');
    $brewery->descripcion = $request->input('descripcion');
    $brewery->poblacion = $request->input('poblacion');
    $brewery->calle = $request->input('calle');
    $brewery->longitude = $request->input('longitude');
    $brewery->latitude = $request->input('latitude');

    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $path = $image->store('brewery_images', 'public');
        $brewery->imagen = $path;
    } else {
        $brewery->imagen = 'bar.jpg';
    }

    $brewery->user_id = Auth::id();

    $brewery->save();

    $selectedBeers = $request->input('beers', []);
    $brewery->beers()->sync($selectedBeers);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('brewery_images', 'public');
            $brewery->images()->create(['img' => $path]);
        }
    }

    return redirect()->route('breweries.index')->with('success', 'Cervecería creada correctamente.');
}


    public function edit($id)
    {
        $brewery = Brewery::findOrFail($id);
        $beers = Beer::all();
        $breweryBeers = $brewery->beers()->pluck('beer_id')->toArray();

        return view('breweries.edit', compact('brewery', 'beers', 'breweryBeers'));
    }

    public function update(Request $request, $id)
    {
        $brewery = Brewery::findOrFail($id);
        $brewery->nombre = $request->input('nombre');
        $brewery->descripcion = $request->input('descripcion');
        $brewery->poblacion = $request->input('poblacion');
        $brewery->calle = $request->input('calle');
        $brewery->longitude = $request->input('longitude');
        $brewery->latitude = $request->input('latitude');

        $beerIds = $request->input('cervezas');
        $brewery->beers()->sync($beerIds);

        if ($request->hasFile('imagen')) {
            Storage::delete($brewery->imagen);
            $brewery->imagen = $request->file('imagen')->store('public');
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('brewery_images', 'public');
                $brewery->images()->create(['img' => $path]);
            }
        }

        if ($request->has('delete-images')) {
            foreach ($request->input('delete-images') as $imageId) {
                $image = Image::findOrFail($imageId);
                Storage::delete($image->img);
                $image->delete();
            }
        }

        $brewery->save();

        return redirect()->route('breweries.show', ['id' => $brewery->id])->with('success', 'Cervecería actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return redirect()->route('breweries.index')->with('message', 'Cervecería no encontrada.')->with('code', 1);
        }

        $brewery->beers()->detach();

        if ($brewery->imagen) {
            Storage::delete('public/' . $brewery->imagen);
        }

        $brewery->delete();

        return redirect()->route('breweries.index')->with('success', 'Cervecería eliminada exitosamente.');
    }

    public function obtenerMasCards(Request $request)
    {
        $offset = $request->input('offset', 0);
        $breweries = Brewery::skip($offset)->take(6)->get();

        return view('breweries.cards', compact('breweries'));
    }
}
