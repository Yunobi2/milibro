<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'buscar']);
    }

    public function index()
    {
        $libros = Libro::get();
        $categorias = Libro::distinct('categoria')->pluck('categoria');
        $categoriaActual = 'Todas'; // Agregamos esta línea
        return view('milibro', compact('libros', 'categorias', 'categoriaActual'));
    }

    public function filtrarPorCategoria($categoria)
    {
        $libros = Libro::where('categoria', $categoria)->get();
        $categorias = Libro::distinct('categoria')->pluck('categoria');
        $categoriaActual = $categoria; // Agregamos esta línea
        return view('milibro', compact('libros', 'categorias', 'categoriaActual'));
    }


    public function show($id)
    {
        $libro = Libro::with(['comentarios.user', 'calificaciones'])
            ->withCount('calificaciones')
            ->withAvg('calificaciones', 'calificacion')
            ->findOrFail($id);

        return view('show', compact('libro'));
    }

    public function favoritos()
    {
        $libros = Libro::get();
        return view('favoritos', compact('libros'));
    }

    public function historial()
    {
        $libros = Libro::get();
        return view('historial', compact('libros'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $libros = Libro::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->orWhere('resumen', 'like', "%{$query}%")
            ->orWhere('categoria', 'like', "%{$query}%")
            ->get();

        return view('milibro', compact('libros'));
    }

}