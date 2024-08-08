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

    public function create()
    {
        return view('dashboard.books');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'paginas' => 'required|numeric',
            'ano' => 'required|numeric',
            'editorial' => 'required',
            'categoria' => 'required',
            'resumen' => 'required',
            'portada' => 'required|url',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'paginas' => $request->paginas,
            'ano' => $request->ano,
            'editorial' => $request->editorial,
            'categoria' => $request->categoria,
            'resumen' => $request->resumen,
            'portada' => $request->portada,
        ]);

        return redirect()->route('dashboard.books')->with('success', 'Libro creado exitosamente.');

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

    public function edit(Libro $libro)
    {
        return view('edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'paginas' => 'required|numeric',
            'ano' => 'required|numeric',
            'editorial' => 'required',
            'categoria' => 'required',
            'resumen' => 'required',
            'portada' => 'required|url',
            'pdf' => 'nullable|mimes:pdf|max:20480',
        ]);
        
        $data = $request->all();

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $data['pdf'] = $pdfPath;
        }

        $libro->update($data);

        return redirect()->route('dashboard.books')->with('success', 'Libro actualizado exitosamente.');
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

        $categorias = Libro::distinct('categoria')->pluck('categoria');
        $categoriaActual = 'Resultados de búsqueda'; // O puedes usar 'Todas' si prefieres
    
        return view('milibro', compact('libros', 'categorias', 'categoriaActual'));
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('dashboard.books')->with('success', 'Libro eliminado exitosamente.');
    }

}