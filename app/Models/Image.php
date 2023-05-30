<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'brewery_id',
        'img',
        // otros campos de la imagen
    ];

    public function brewery()
    {
        return $this->belongsTo(Brewery::class);
    }

    // otros métodos del modelo
}
