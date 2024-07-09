<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Libro;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Libro $libro)
    {
        $request->validate([
            'comentario' => 'required|string|max:1000',
        ]);

        $comentario = new Comentario([
            'user_id' => auth()->id(),
            'libro_id' => $libro->id,
            'comentario' => $request->comentario,
        ]);

        $comentario->save();

        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }

    public function update(Request $request, Comentario $comentario)
    {
        $request->validate([
            'comentario' => 'required|string',
        ]);

        $comentario->update([
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario actualizado exitosamente.');
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
    }
}