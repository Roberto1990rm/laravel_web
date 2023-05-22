<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->text('descripcion');
            $table->string('poblacion', 200);
            $table->string('calle', 200);
            $table->decimal('latitude', 10, 3);
            $table->decimal('longitude', 10, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breweries');
    }
};