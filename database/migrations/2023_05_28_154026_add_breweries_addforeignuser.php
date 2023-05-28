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
        //
        Schema::table('breweries', function (Blueprint $table) {
            $table->foreignID('user_id')
            ->afeter('poblacion')
            ->nullable()

            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            //->nullOnDelete();Borro la cervecería si borro el usuario autor

        });
    }

    public function down(): void
    {
        Schema::table('breweries', function(Blueprint $table){
            $table->dropForeign ('breweries_user_id_foreign');
        });
    }
};
