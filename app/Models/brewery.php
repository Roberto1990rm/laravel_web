<?php

namespace App\Models;

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

    // otras relaciones y métodos del modelo
}
