@extends('layouts.home')

@section('content')
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
        </div>
        <div class="main-content">
            <h2>Favoritos</h2>
            <div class="p-5">
                <div class="w-full p-4 mb-2 cursor-pointer">
                    @foreach($libros as $libro)
                    <a class="flex no-underline text-black w-full  border rounded-xl hover:scale-105 duration-500 mb-3" href="/home/{{ $libro->id }}">
                        <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}" class=" h-72 border">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class=" text-2xl font-bold">{{$libro->titulo}}</p>
                                    <p class=" text-gray-800 ">{{ $libro->autor }}</p>
                                </div>
                                <img src="{{ asset('/icons/heart-fill.svg')}}" class="w-7 items-start" alt="icono de corazon">
                            </div>
                            <p class=" line-clamp-5 text-justify">{{ $libro->resumen }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection