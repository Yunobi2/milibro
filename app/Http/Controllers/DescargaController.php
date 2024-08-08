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
