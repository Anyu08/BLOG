<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
    public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        // Verificar si la columna 'image' ya existe antes de agregarla
        if (!Schema::hasColumn('posts', 'image')) {
            $table->string('image')->nullable();
        }
    });
}


};
