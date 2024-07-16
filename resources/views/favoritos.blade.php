@extends('layouts.home')

@section('content')
    <section class="content">
        <div class="sidebar">
            <h2>Libro por Categoría</h2>
                <ul>
                    <a href="{{ route('favoritos.index') }}" class="{{ $categoriaActual == 'Todas' ? 'active' : '' }} no-underline text-black"><li>Todas las categorías</li></a>
                    @foreach($categorias as $categoria)
                        <a href="{{ route('favoritos.categoria', $categoria) }}" class="no-underline text-black"><li class="{{ $categoriaActual == $categoria ? 'bg-[#ffba61] text-white' : '' }}">{{ $categoria }}</li>
                        </a>
                    @endforeach
                </ul>
        </div>
        <div class="main-content">
            <h2>Favoritos - {{ $categoriaActual }}</h2>
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