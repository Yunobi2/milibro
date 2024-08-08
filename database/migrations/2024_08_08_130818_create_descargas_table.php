<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescargasTable extends Migration
{
    public function up()
    {
        Schema::create('descargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_id')->constrained('libros')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps(); // Esto agregará created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('descargas');
    }
}

