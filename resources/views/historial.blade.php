@extends('layouts.home')

@section('content')
    <section class="content">
        <div class="sidebar">
            <h2>Libro por Género</h2>
            <ul>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Todos' ? 'bg-[#ffba61] text-white' : '' }}">Todos los géneros</li></a>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Fantasía' ? 'bg-[#ffba61] text-white' : '' }}">Fantasía</li></a>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Autoayuda' ? 'bg-[#ffba61] text-white' : '' }}">Autoayuda</li></a>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Ficción' ? 'bg-[#ffba61] text-white' : '' }}">Ficción</li></a>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Ficción Filosófica' ? 'bg-[#ffba61] text-white' : '' }}">Ficción Filosófica</li></a>
                <a href="#" class="no-underline text-black"><li class="{{ $generoActual == 'Cuento' ? 'bg-[#ffba61] text-white' : '' }}">Cuento</li></a>
            </ul>
        </div>
        <div class="main-content">
            <h2>Historial de Descargas - {{ $generoActual }}</h2>
            <div class="row">
                <div class="book-list">
                    @if($descargas->isEmpty())
                        <p>No hay descargas registradas.</p>
                    @else
                        @foreach($descargas as $descarga)
                            <a class="book" href="/home/{{ $descarga->libro->id }}">
                                <img src="{{ $descarga->libro->portada }}" alt="{{ $descarga->libro->titulo }}">
                                <p>{{ $descarga->libro->titulo }}</p>
                                <p>{{ $descarga->libro->autor }}</p>
                                <p>Descargado el: {{ $descarga->created_at }}</p>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
