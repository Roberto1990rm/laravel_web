<?php

namespace Database\Seeders;

use App\Models\Beer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class BeerSeeder extends Seeder
{
    public function run(): void
    {
        $beers = [
            [
                'nombre' => 'Stella Artois',
                'marca' => 'AB InBev',
                'vol' => 5.0,
                'descripcion' => 'Stella Artois es una cerveza de estilo pilsner elaborada con malta de cebada, lúpulos seleccionados y levadura de origen belga.'
            ],
            [
                'nombre' => 'Guinness Draught',
                'marca' => 'Guinness',
                'vol' => 4.2,
                'descripcion' => 'Guinness Draught es una cerveza negra seca y cremosa, con una espuma densa y persistente.'
            ],
            [
                'nombre' => 'Paulaner Hefe-Weißbier',
                'marca' => 'Paulaner',
                'vol' => 5.5,
                'descripcion' => 'Paulaner Hefe-Weißbier es una cerveza de trigo alemana, de color dorado y turbia debido a su levadura especial.'
            ],
            [
                'nombre' => 'Heineken',
                'marca' => 'Heineken',
                'vol' => 5.0,
                'descripcion' => 'Heineken es una cerveza lager premium, de color dorado y sabor refrescante.'
            ],
            [
                'nombre' => 'Corona',
                'marca' => 'Grupo Modelo',
                'vol' => 4.5,
                'descripcion' => 'Corona es una cerveza mexicana de estilo lager, reconocida por su característica botella transparente y su imagen veraniega.'
            ],

            [
                'nombre' => 'Budweiser',
                'marca' => 'Anheuser-Busch InBev',
                'vol' => 5.0,
                'descripcion' => 'Budweiser es una cerveza lager icónica de Estados Unidos, conocida por su sabor suave y equilibrado.'
            ],
            [
                'nombre' => 'Weihenstephaner Hefeweissbier',
                'marca' => 'Bayerische Staatsbrauerei Weihenstephan',
                'vol' => 5.4,
                'descripcion' => 'Weihenstephaner Hefeweissbier es una cerveza de trigo alemana clásica, con aromas y sabores a plátano y clavo de olor.'
            ],
            [
                'nombre' => 'Chimay Blue',
                'marca' => 'Abbaye Notre-Dame de Scourmont',
                'vol' => 9.0,
                'descripcion' => 'Chimay Blue es una cerveza trapense belga oscura y fuerte, con notas a frutas oscuras y caramelo.'
            ],
            [
                'nombre' => 'La Chouffe',
                'marca' => 'Brasserie d\'Achouffe',
                'vol' => 8.0,
                'descripcion' => 'La Chouffe es una cerveza belga dorada y especiada, con un toque de dulzura y sabor a lúpulo.'
            ],
            [
                'nombre' => 'Sierra Nevada Pale Ale',
                'marca' => 'Sierra Nevada Brewing Company',
                'vol' => 5.6,
                'descripcion' => 'Sierra Nevada Pale Ale es una cerveza artesanal estadounidense con un amargor distintivo y sabores cítricos de lúpulo.'
            ]
        ];

        // Insertar los datos en la base de datos utilizando el modelo Cerveza
        foreach ($beers as $beer) {
            Beer::create($beer);
        }
    }
}
