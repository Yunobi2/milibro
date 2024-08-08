<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Libro; // Importa la clase Libro
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReporteController extends Controller
{
    public function index()
    {
        $librosMasFavoritos = DB::table('libros')
            ->join('favoritos', 'libros.id', '=', 'favoritos.libro_id')
            ->select('libros.titulo', DB::raw('COUNT(favoritos.id) as total_favoritos'))
            ->groupBy('libros.titulo')
            ->orderBy('total_favoritos', 'desc')
            ->take(10)
            ->get();
    
        $usuariosMasFavoritos = DB::table('users')
            ->join('favoritos', 'users.id', '=', 'favoritos.user_id')
            ->select('users.name', DB::raw('COUNT(favoritos.id) as total_favoritos'))
            ->groupBy('users.name')
            ->orderBy('total_favoritos', 'desc')
            ->take(10)
            ->get();
    
        $categoriasMasFavoritas = DB::table('libros')
            ->join('favoritos', 'libros.id', '=', 'favoritos.libro_id')
            ->select('libros.categoria', DB::raw('COUNT(favoritos.id) as total_favoritos'))
            ->groupBy('libros.categoria')
            ->orderBy('total_favoritos', 'desc')
            ->get();
    
        $favoritosDescargasRelacion = DB::table('libros')
            ->leftJoin('favoritos', 'libros.id', '=', 'favoritos.libro_id')
            ->leftJoin('descargas', 'libros.id', '=', 'descargas.libro_id')
            ->select('libros.titulo', DB::raw('COUNT(favoritos.id) as total_favoritos'), DB::raw('COUNT(descargas.id) as total_descargas'))
            ->groupBy('libros.titulo')
            ->orderBy('total_favoritos', 'desc')
            ->get();

        $usuariosMasActivosDescargas = DB::table('users')
            ->join('descargas', 'users.id', '=', 'descargas.user_id')
            ->select('users.name', DB::raw('COUNT(descargas.id) as total_descargas'))
            ->groupBy('users.name')
            ->orderBy('total_descargas', 'desc')
            ->take(10)
            ->get();

        $tiempoPromedioFavoritoDescarga = DB::table('favoritos')
            ->join('descargas', function($join) {
                $join->on('favoritos.libro_id', '=', 'descargas.libro_id')
                     ->on('favoritos.user_id', '=', 'descargas.user_id');
            })
            ->select(DB::raw('AVG(TIMESTAMPDIFF(MINUTE, favoritos.created_at, descargas.created_at)) as tiempo_promedio'))
            ->get();
        
        $librosMasDescargadosDesdeFavoritos = DB::table('libros')
            ->leftJoin('favoritos', 'libros.id', '=', 'favoritos.libro_id')
            ->leftJoin('descargas', 'libros.id', '=', 'descargas.libro_id')
            ->select('libros.titulo', DB::raw('COUNT(descargas.id) / COUNT(favoritos.id) * 100 as porcentaje_descargas'))
            ->groupBy('libros.titulo')
            ->orderBy('porcentaje_descargas', 'desc')
            ->take(10)
            ->get();
            $librosMasComentados = DB::table('libros')
            ->join('comentarios', 'libros.id', '=', 'comentarios.libro_id')
            ->select('libros.titulo', DB::raw('COUNT(comentarios.id) as total_comentarios'))
            ->groupBy('libros.titulo')
            ->orderBy('total_comentarios', 'desc')
            ->take(10)
            ->get();
    
        $usuariosMasComentadores = DB::table('users')
            ->join('comentarios', 'users.id', '=', 'comentarios.user_id')
            ->select('users.name', DB::raw('COUNT(comentarios.id) as total_comentarios'))
            ->groupBy('users.name')
            ->orderBy('total_comentarios', 'desc')
            ->take(10)
            ->get();
    
        $librosMejorCalificados = DB::table('libros')
            ->join('calificaciones', 'libros.id', '=', 'calificaciones.libro_id')
            ->select('libros.titulo', DB::raw('AVG(calificaciones.calificacion) as calificacion_promedio'))
            ->groupBy('libros.titulo')
            ->orderBy('calificacion_promedio', 'desc')
            ->take(10)
            ->get();
    
        $distribucionCalificaciones = DB::table('calificaciones')
            ->select('libro_id', 'calificacion', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('libro_id', 'calificacion')
            ->get();
    
        $usuariosMasActivos = DB::table('users')
            ->leftJoin('descargas', 'users.id', '=', 'descargas.user_id')
            ->leftJoin('comentarios', 'users.id', '=', 'comentarios.user_id')
            ->select('users.name', DB::raw('COUNT(distinct descargas.id) as total_descargas'), DB::raw('COUNT(distinct comentarios.id) as total_comentarios'))
            ->groupBy('users.name')
            ->orderBy('total_descargas', 'desc')
            ->orderBy('total_comentarios', 'desc')
            ->take(10)
            ->get();
    
        return view('dashboard.reports', compact('librosMasFavoritos', 'usuariosMasFavoritos', 'categoriasMasFavoritas', 'favoritosDescargasRelacion', 'usuariosMasActivosDescargas', 'tiempoPromedioFavoritoDescarga', 'librosMasDescargadosDesdeFavoritos', 'librosMasComentados', 'usuariosMasComentadores', 'librosMejorCalificados', 'distribucionCalificaciones', 'usuariosMasActivos'));
    }
    


    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        Reporte::create($request->all());

        return redirect()->route('reportes.index')->with('success', 'Reporte creado exitosamente.');
    }

    public function show(Reporte $reporte)
    {
        return view('reportes.show', compact('reporte'));
    }

    public function edit(Reporte $reporte)
    {
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, Reporte $reporte)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $reporte->update($request->all());

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado exitosamente.');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();

        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado exitosamente.');
    }
}
