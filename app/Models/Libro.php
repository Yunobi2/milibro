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
        'portada',
        'pdf' // Agregar 'pdf' a los campos rellenables
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function calificacionPromedio()
    {
        return $this->calificaciones()->avg('calificacion');
    }
    
    //favoritos
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function esFavorito($userId)
    {
        return $this->favoritos()->where('user_id', $userId)->exists();
    }
}
