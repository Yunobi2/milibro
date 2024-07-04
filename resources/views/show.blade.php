@extends('layouts.home')

@section('content')
<section class="p-5 mx-20">
  <h2 class="text-2xl">Libro</h2>
  <hr>
  <section class="flex m-4">
    <img src="https://marketplace.canva.com/EAFGf9027eM/1/0/1003w/canva-portada-libro-infantil-bosque-ilustrado-azul-P3McSjgOm1I.jpg" width="360" height="600" alt="Where The Crawdads Sing">

    <div class="w-full p-5">
      <div class="flex justify-between">
        <div class="">
          <h3>Autor</h3>
          <h3>Titulo</h3>
        </div>
        <div class="flex">
          <img class="w-7" src="{{asset('icons/heart.svg')}}" alt="">
          <img class="w-7" src="{{asset('icons/compartir.svg')}}" alt="">
        </div>
      </div>
      <div>
        <p>fecha - n° paginas</p>
        <p>categorias</p>
        <p>descripcion</p>
        <button>Leer</button>
      </div>
    </div>
  </section>
  <h2 class="text-2xl text-center my-2">Opiniones sobre la ciudad de las bestias</h2>
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