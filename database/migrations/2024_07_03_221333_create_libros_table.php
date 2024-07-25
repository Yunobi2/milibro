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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->integer('paginas');
            $table->year('ano');
            $table->string('editorial')->nullable();
            $table->string('categoria');
            $table->text('resumen')->nullable(); 
            $table->string('portada');
            $table->string('pdf')->nullable(); // {{ edit_1 }} Agregar campo para el PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
