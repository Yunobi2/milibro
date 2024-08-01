
@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="flex-grow-1">
        <main class="p-4" >
            <h2 class="mb-4">SISTEMA BIBLIOTECARIO-INICIO</h2>
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <span class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="{{asset('icons/usuario.svg')}}" alt="usuarios icon" class="mb-2">
                                    <p class="mb-0">USUARIOS</p>
                                    <p>{{ $totalUsers }}</p>
    
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="col">
                        <span class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="{{asset('icons/autor.svg')}}" alt="autores icon" class="mb-2">
                                    <p class="mb-0">AUTORES</p>
                                    <p>{{ $totalAuthors }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="col">
                        <span class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="{{asset('icons/libros.svg')}}" alt="libros icon" class="mb-2">
                                    <p class="mb-0">LIBROS</p>
                                    <p>{{ $totalBooks }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>



                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <span class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="{{asset('icons/categoria.svg')}}" alt="categoría icon" class="mb-2">
                                    <p class="mb-0">CATEGORÍA</p>
                                    <p>{{ $totalCategories }}</p>
    
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="col">
                        <span class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="{{asset('icons/reporte.svg')}}" alt="reportes icon" class="mb-2">
                                    <p class="mb-0">REPORTES</p>
                                    <p>{{ $totalReports }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection  
