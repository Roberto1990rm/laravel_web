<?php  //bueno

namespace App\Http\Controllers;

use App\Http\Requests\BreweryRequest;
use Illuminate\Http\Request;
use App\Models\Brewery;
use App\Models\Beer;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
        $brewery = Brewery::with('images')->findOrFail($id);

        return view('breweries.show', compact('brewery'));

    }

    public function create()
{
    $beers = Beer::orderBy('nombre')->get();

    return view('breweries.create', compact ('beers'));
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

    // Asignar el usuario autenticado como creador de la cervecería
    $brewery->user_id = Auth::id(); 
    
    
    // Obtener el ID del usuario autenticado

    // Guardar la imagen principal
    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $path = $image->store('brewery_images', 'public');
        $brewery->imagen = $path;
    } else {
        // Si no se proporciona una nueva imagen, asignar la imagen por defecto
        $brewery->imagen = 'bar.jpg';
    }

    // Guardar la cervecería
    $brewery->save();
    $beers = $request->beers;
    $brewery->beers()->attach($beers);

    // Obtener el ID de la cervecería guardada
    $breweryId = $brewery->id;

    // Guardar las imágenes adicionales
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('brewery_images', 'public');
            $breweryImage = new Image();
            $breweryImage->brewery_id = $breweryId; // Asignar el ID de la cervecería a brewery_id
            $breweryImage->img = $path;
            $breweryImage->save();
        }
    }

    return redirect()->route('breweries.index')->with('success', 'La cervecería se ha creado correctamente.');
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
    $brewery = Brewery::findOrFail($id);
    $brewery->nombre = $request->input('nombre');
    $brewery->descripcion = $request->input('descripcion');
    $brewery->poblacion = $request->input('poblacion');
    $brewery->calle = $request->input('calle');
    $brewery->longitude = $request->input('longitude');
    $brewery->latitude = $request->input('latitude');

    if ($request->hasFile('imagen')) {
        // Eliminar imagen anterior
        Storage::delete($brewery->imagen);

        // Guardar nueva imagen
        $brewery->imagen = $request->file('imagen')->store('public');
    }

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Guardar imágenes adicionales
            $path = $image->store('brewery_images', 'public');
            $brewery->images()->create(['img' => $path]);
        }
    }

    if ($request->has('delete-images')) {
        foreach ($request->input('delete-images') as $imageId) {
            // Eliminar imágenes adicionales seleccionadas
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

        if ($brewery->imagen) {
            Storage::delete('public/' . $brewery->imagen);
        }

        $brewery->delete();

        return redirect()->route('breweries.index')->with('success', 'Cervecería eliminada correctamente.');
    }
}
