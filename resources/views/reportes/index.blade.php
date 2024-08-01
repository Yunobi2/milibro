@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Reportes</h1>
    <a href="{{ route('reportes.create') }}" class="btn btn-primary">Crear Reporte</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->titulo }}</td>
                    <td>{{ $reporte->contenido }}</td>
                    <td>
                        <a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
