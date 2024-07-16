@extends('layouts.home')

@section('content')
<main>
<section class="hero">
    <div class="hero-banner">
        <div class="banner-text">
            <h1>Bienvenido a MILIBRO</h1>
            <p>Descubre un mundo de libros a tu alcance</p>
        </div>
    </div>
    <div class="hero-text">
        <p>Encuentra tu libro favorito y léalo aquí gratis</p>
        <form action="{{ route('buscar') }}" method="GET">
            <input type="text" name="q" id="buscarLibro" placeholder="Buscar Libro" value="{{ request('q') }}">
            <button><i class="bi bi-search lupa"></i></button>

        </form>
    </div>
    <div class="hero-image">
        <img src="https://cdn.pixabay.com/photo/2024/02/28/12/39/girl-8601996_1280.png" alt="Reading Woman">
    </div>
</section>

<section class="content">
    <div class="sidebar">
        <h2>Libro por Categoría</h2>
        <ul>
            <a href="{{ route('libros.index') }}" class="{{ $categoriaActual == 'Todas' ? 'active' : '' }} no-underline text-black"><li>Todas las categorías</li></a>
            @foreach($categorias as $categoria)
                <a href="{{ route('libros.categoria', $categoria) }}" class="no-underline text-black"><li class="{{ $categoriaActual == $categoria ? 'bg-[#ffba61] text-white' : '' }}">{{ $categoria }}</li>
                </a>
            @endforeach
        </ul>

        <h2>Recomendaciones</h2>
        <ul>
            <li>Autor del mes</li>
            <li>Libro del año</li>
            <li>Género Top</li>
            <li>Tendencia</li>
        </ul>
    </div>

    <div class="main-content">
        {{-- @if(isset($libros) && $libros->isNotEmpty()) --}}
            <h2>{{$categoriaActual}}</h2>
            <div class="book-list">
                @foreach($libros as $libro)
                    <a class="book" href="/home/{{ $libro->id }}">
                        <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}">
                        <p>{{ $libro->titulo }}</p>
                        <p>{{ $libro->autor }}</p>
                    </a>
                @endforeach
            </div>
    </div>
</section>
</main>
@endsection
