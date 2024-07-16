@extends('layouts.home')

@section('content')
    <section class="content">
        <div class="sidebar">
            
            <h2>Libro por Género</h2>
            <ul>
                <li>Todos los géneros</li>
                <li>Fantasía</li>
                <li>Autoayuda</li>
                <li>Ficción</li>
                <li>Ficción Filosófica</li>
                <li>Cuento</li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Favoritos</h2>
            <div class="row">
                    <div class="book-list">
                        @forelse ($libros as $libro)
                            <a class="book" href="/home/{{ $libro->id }}">
                                <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}">
                                <p>{{ $libro->titulo }}</p>
                                <p>{{ $libro->autor }}</p>
                            </a>
                @empty
                    <p>No tienes libros favoritos aún.</p>
                @endforelse
                    </div>
            </div>
        </div>
    </section>
@endsection