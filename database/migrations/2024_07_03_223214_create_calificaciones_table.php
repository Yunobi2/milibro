<!-- 

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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('libro_id')->constrained('libros')->onDelete('cascade');
            $table->tinyInteger('calificacion')->unsigned()->check('calificacion BETWEEN 1 AND 5');
            $table->timestamp('fecha_calificacion')->useCurrent();
            $table->timestamps();

            $table->unique(['user_id', 'libro_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
}; -->

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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('libro_id')->constrained('libros')->onDelete('cascade');
            $table->tinyInteger('calificacion')->unsigned()->comment('Valor entre 1 y 5');
            $table->timestamp('fecha_calificacion')->useCurrent();
            $table->timestamps();

            $table->unique(['user_id', 'libro_id']);
        });

        // Añadir la restricción CHECK después de la creación de la tabla
        DB::statement('ALTER TABLE calificaciones ADD CONSTRAINT check_calificacion CHECK (calificacion BETWEEN 1 AND 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
