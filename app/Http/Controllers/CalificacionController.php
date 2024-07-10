<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Calificacion;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function store(Request $request, Libro $libro)
    {
        $request->validate([
            'calificacion' => 'required|integer|between:1,5',
        ]);
 
        $calificacion = Calificacion::updateOrCreate(
            ['user_id' => auth()->id(), 'libro_id' => $libro->id],
            ['calificacion' => $request->calificacion, 'fecha_calificacion' => now()]
        );

        return redirect()->back()->with('success', 'Calificación guardada exitosamente.');
    }
}