<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    public function breweries()
    {
        return $this->belongsToMany(Brewery::class, 'beer_brewery', 'beer_id', 'brewery_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($beer) {
            $beer->breweries()->detach();
        });
    }
}
