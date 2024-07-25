@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="d-flex flex-column">
    <main class="p-4 flex-grow-1">
        <h2 class="mb-4">SISTEMA BIBLIOTECARIO-GESTIÓN DE LIBROS</h2>
        
        <!-- Apartados -->
        <div class="mb-3">
            <button class="btn btn-primary">Lista de Libros</button>
            <button class="btn btn-secondary">Agregar libro</button>
            <button class="btn btn-secondary">Agregar categoría</button>
        </div>

        <!-- Barra de búsqueda -->
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Ingrese Título o ID" aria-label="Buscar">
        </div>

        <!-- Tabla de Libros -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor(es)</th>
                        <th>Año</th>
                        <th>Editorial</th>
                        <th>Categoría</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí puedes agregar los datos de los libros -->
                    <tr>
                        <td>1</td>
                        <td>Título</td>
                        <td>Autor(es)</td>
                        <td>Año</td>
                        <td>Editorial</td>
                        <td>Categoría</td>
                        <td><button class="btn btn-warning">✏️</button></td>
                        <td><button class="btn btn-danger">❌</button></td>
                    </tr>
                    <!-- Repite el bloque anterior para más libros -->
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection