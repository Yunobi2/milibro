<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = [
        'titulo', 
        'autor', 
        'paginas', 
        'ano', 
        'editorial', 
        'categoria', 
        'resumen', 
        'portada'
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    
}
