<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('reportes.index', compact('reportes'));
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
