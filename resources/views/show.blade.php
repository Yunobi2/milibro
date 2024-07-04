@extends('layouts.home')

@section('content')
<section class="p-5 mx-20">
  <h2 class="text-2xl">Libro</h2>
  <hr>
  <section class="flex m-4">
    <img src="{{ $libro->portada}}">

    <div class="w-full p-5">
      <div class="flex justify-between">
        <div class="">
          <h3>{{ $libro->autor }}</h3>
          <h3>{{ $libro->titulo }}</h3>
        </div>
        <div class="flex gap-4">
          <img class="p-2 rounded hover:bg-yellow-300"" src="{{asset('icons/heart.svg')}}" alt="">
          <img class="p-2 rounded hover:bg-yellow-300"" src="{{asset('icons/compartir.svg')}}" alt="">
        </div>
      </div>
      <div>
        <p>{{ $libro->ano }} - n° paginas</p>
        <p>{{ $libro->categoria }}</p>
        <p>{{ $libro->resumen }}</p>
        <button class="border bg-yellow-400 py-1 px-3 rounded-md">Leer</button>
      </div>
    </div>
  </section>
  <h2 class="text-2xl text-center my-2">Opiniones sobre {{ $libro->titulo }}</h2>
  <hr>
  <section class="m-4">
    <div class="flex">
      <p> (n comentarios)</p>
      <p> ★★★★★ </p>
    </div>
    <div class="flex">
      <p>(n comentarios)</p>
      <p> ★★★★</p>
    </div>
    <div class="flex">
      <p>(n comentarios)</p>
      <p> ★★★</p>
    </div>
    <div class="flex">
      <p>(n comentarios)</p>
      <p> ★★</p>
    </div>
    <div class="flex">
      <p>(n comentarios)</p>
      <p> ★</p>
    </div>
    <h3 class="text-xl text-center">puntaje 5/5</h3>
  </section>
  <h2 class=" font-semibold">n opiniones de usuarios</h2>
  <div class="flex border p-3">
    <div>
      <p>user</p>
      <p>fecha</p>
    </div>
    <p>comentario</p>
  </div>
</section>
  
@endsection