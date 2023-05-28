<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    protected $table = 'breweries';
    // Resto de configuraciones y relaciones del modelo

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
