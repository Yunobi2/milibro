<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Libro;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function index()
    {
        $libros = auth()->user()->libros;
        return view('favoritos', compact('libros'));
    }

    public function toggle(Request $request, Libro $libro)
    {
        \Log::info('Toggle favorito para libro: ' . $libro->id);
        $userId = auth()->id();
        \Log::info('Usuario ID: ' . $userId);

        $userId = auth()->id();
        $favorito = Favorito::where('user_id', $userId)->where('libro_id', $libro->id)->first();

        if ($favorito) {
            $favorito->delete();
            $isFavorito = false;
        } else {
            Favorito::create([
                'user_id' => $userId,
                'libro_id' => $libro->id
            ]);
            $isFavorito = true;
        }

        return response()->json(['isFavorito' => $isFavorito]);

        \Log::info('Respuesta: ' . json_encode(['isFavorito' => $isFavorito]));
        return response()->json(['isFavorito' => $isFavorito]);
    }
}