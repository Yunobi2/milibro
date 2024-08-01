<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE calificaciones ADD CONSTRAINT check_calificacion_nueva CHECK (calificacion BETWEEN 1 AND 5)');
    }
    
    public function down()
    {
        DB::statement('ALTER TABLE calificaciones DROP CONSTRAINT check_calificacion_nueva');
    }
};