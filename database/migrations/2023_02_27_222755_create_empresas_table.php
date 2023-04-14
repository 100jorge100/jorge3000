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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200)->unique();
            $table->text('descripcion')->nullable();
            $table->string('sigla', 20)->unique();
            $table->string('email', 130)->unique();
            $table->string('telefono', 15)->unique();
            $table->text('direccion', 50)->unique();
            $table->string('direccion_web', 50)->unique();
            $table->string('nit',15)->unique();
            $table->string('estado',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
