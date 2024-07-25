@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="d-flex">
        <main class="p-4 flex-grow-1" ">
            <h2 class="mb-4">SISTEMA BIBLIOTECARIO-INICIO</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <span class="text-decoration-none text-dark">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{asset('icons/usuario.svg')}}" alt="usuarios icon" class="mb-2">
                                <p class="mb-0">USUARIOS</p>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-md-4 mb-3">
                    <span class="text-decoration-none text-dark">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{asset('icons/autor.svg')}}" alt="autores icon" class="mb-2">
                                <p class="mb-0">AUTORES</p>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-md-4 mb-3">
                    <span class="text-decoration-none text-dark">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{asset('icons/libros.svg')}}" alt="libros icon" class="mb-2">
                                <p class="mb-0">LIBROS</p>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-md-4 mb-3">
                    <span class="text-decoration-none text-dark">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{asset('icons/categoria.svg')}}" alt="categoría icon" class="mb-2">
                                <p class="mb-0">CATEGORÍA</p>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-md-4 mb-3">
                    <span class="text-decoration-none text-dark">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{asset('icons/reporte.svg')}}" alt="reportes icon" class="mb-2">
                                <p class="mb-0">REPORTES</p>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </main>
    </div>
@endsection 