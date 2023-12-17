<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'calle',
        'poblacion',
        'ciudad',
        // otros campos de la cervecería
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function beers()
{
    return $this->belongsToMany(Beer::class);
}

    // otras relaciones y métodos del modelo
}
