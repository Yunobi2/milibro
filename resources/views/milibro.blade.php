{{-- @extends('layouts.home')

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
        <input type="text" id="buscarLibro" placeholder="Buscar Libro">
    </div>
    <div class="hero-image">
        <img src="https://cdn.pixabay.com/photo/2024/02/28/12/39/girl-8601996_1280.png" alt="Reading Woman">
    </div>
</section>

    <section class="content">
        <div class="sidebar">
            <h2>Libro por Género</h2>
            <ul>
                <li>Todos los géneros</li>
                <li>Negocios</li>
                <li>Ciencia</li>
                <li>Ficción</li>
                <li>Filosofía</li>
                <li>Biografía</li>
            </ul>

            <h2>Recomendaciones</h2>
            <ul>
                <li>Autor del mes</li>
                <li>Libro del añor</li>
                <li>Género Top</li>
                <li>Tendencia</li>
            </ul>
        </div>

        <div class="main-content">
            <h2>Recomendado</h2>
            <div class="book-list">
                @foreach($libros as $libro)
                    <a class="book" href="/home/{{ $libro->id }}">
                        <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}">
                        <p>{{$libro->titulo}}</p>
                        <p>{{ $libro->autor }}</p>
                    </a>
                @endforeach
            </div>
            <h2>Populares</h2>
            <div class="book-list">
                <a class="book" href="/">
                    <img src="https://www.casadelaliteratura.gob.pe/wp-content/uploads/2013/11/PortadaLaciudadyLosPerros.jpg" width="120" height="200" alt="All The Light We Cannot See">
                    <p>La ciuidad y los perros</p>
                    <p>Mario Vargas Llosa</p>
                </a>

                

                <a class="book" href="/">
                    <img src="https://www.infobae.com/new-resizer/gvtt1qXAS4BlGVE1pgPc02h4XVA=/1200x1800/filters:format(webp):quality(85)/s3.amazonaws.com/arc-wordpress-client-uploads/infobae-wp/wp-content/uploads/2016/07/20201800/mejores-libros-Don-Quijote-sf.jpg" width="120" height="200" alt="Crazy Rich Asians">
                    <p>Don Quijote de la Mancha</p>
                    <p>Miguel de Cervantes</p>
            
                </a>
        </div>
    </section>
</main>
@endsection --}}

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
