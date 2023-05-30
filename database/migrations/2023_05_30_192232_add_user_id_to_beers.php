<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('beers', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable();

        // Agrega una clave foránea a la columna 'user_id' que hace referencia a la tabla 'users'
        $table->foreign('user_id')->references('id')->on('users');

        // Si deseas que la columna 'user_id' sea obligatoria, cambia 'nullable()' a 'nullable(false)'
        // $table->unsignedBigInteger('user_id')->nullable(false);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('beers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    
};
