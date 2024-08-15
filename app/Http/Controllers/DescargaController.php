<?php

namespace App\Http\Controllers;
use App\Models\Descarga;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DescargaController extends Controller
{
    /**
     * Muestra la lista de descargas (si se requiere).
     */
    public function index()
    {
        $descargas = Descarga::with('libro', 'user')->orderBy('created_at', 'desc')->get();
        return view('descargas.index', compact('descargas'));
    }

    /**
     * Descarga un libro y registra la descarga.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function descargarLibro($id)
    {
        $libro = Libro::findOrFail($id);
        $descarga = new Descarga();
        $descarga->libro_id = $libro->id;
        $descarga->user_id = auth()->user()->id;
        $descarga->save();

        return Storage::disk('public')->download($libro->pdf);
    }

    /**
     * Muestra el historial de descargas del usuario autenticado con la funcionalidad de filtrado por género y categoría.
     *
     * @return \Illuminate\Http\Response
     */
    public function historialDescargas(Request $request)
    {
        // Obtener todos los géneros disponibles
        $generos = ['Todos', 'Fantasía', 'Autoayuda', 'Ficción', 'Ficción Filosófica', 'Cuento'];

        // Obtener el género seleccionado desde la solicitud, si no se selecciona, mostrar 'Todos'
        $generoActual = $request->input('genero', 'Todos');

        // Obtener la categoría seleccionada desde la solicitud, si no se selecciona, mostrar 'Todas'
        $categoriaActual = $request->input('categoria', 'Todas');

        // Obtener las descargas del usuario autenticado
        $query = Descarga::with('libro')->where('user_id', auth()->user()->id);

        // Filtrar descargas por género si no es "Todos"
        if ($generoActual != 'Todos') {
            $query->whereHas('libro', function($q) use ($generoActual) {
                $q->where('genero', $generoActual);
            });
        }

        // Filtrar descargas por categoría si no es "Todas"
        if ($categoriaActual != 'Todas') {
            $query->whereHas('libro', function($q) use ($categoriaActual) {
                $q->where('categoria', $categoriaActual);
            });
        }

        // Obtener descargas ordenadas por la fecha de creación
        $descargas = $query->orderBy('created_at', 'desc')->get();

        // Pasar las descargas, géneros, género actual y categoría actual a la vista
        return view('historial', compact('descargas', 'generos', 'generoActual', 'categoriaActual'));
    }

    /**
     * Elimina una descarga (si se requiere).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descarga = Descarga::findOrFail($id);
        $descarga->delete();

        return back()->with('success', 'Registro de descarga eliminado exitosamente.');
    }
}