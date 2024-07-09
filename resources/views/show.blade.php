{{-- @extends('layouts.home')

@section('content')
<section class="p-5 mx-20">
  <h2 class="text-2xl">Libro</h2>
  <hr>
  <section class="flex m-4">
    <img src="{{ $libro->portada}}" class="w-1/3">

    <div class="w-full p-5">
      <div class="flex justify-between">
        <div class="">
          <h3>{{ $libro->autor }}</h3>
          <h3>{{ $libro->titulo }}</h3>
        </div>
        <div class="flex gap-4">
          <img class="px-1 w-8 rounded hover:bg-yellow-300" src="{{asset('icons/heart.svg')}}" alt="">
          <img class="px-1 w-8 rounded hover:bg-yellow-300" src="{{asset('icons/compartir.svg')}}" alt="">
        </div>
      </div>
      <div>
        <p>{{ $libro->ano }} - {{ $libro->paginas }}</p>
        <p>{{ $libro->categoria }}</p>
        <p>{{ $libro->resumen }}</p>
        <button class="border bg-yellow-400 py-1 px-3 rounded-md">Descargar</button>
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

@endsection  --}}

{{-- cometarios --}}
@extends('layouts.home')

@section('content')
<section class="p-5 mx-20">
  <h2 class="text-2xl">Libro</h2>
  <hr>
  <section class="flex m-4">
    <img src="{{ $libro->portada}}" class="w-1/3">

    <div class="w-full p-5">
      <div class="flex justify-between">
        <div class="">
          <h3>{{ $libro->autor }}</h3>
          <h3>{{ $libro->titulo }}</h3>
        </div>
        <div class="flex gap-4">
          <img class="px-1 w-8 rounded hover:bg-yellow-300" src="{{asset('icons/heart.svg')}}" alt="">
          <img class="px-1 w-8 rounded hover:bg-yellow-300" src="{{asset('icons/compartir.svg')}}" alt="">
        </div>
      </div>
      <div>
        <p>{{ $libro->ano }} - {{ $libro->paginas }}</p>
        <p>{{ $libro->categoria }}</p>
        <p>{{ $libro->resumen }}</p>
        <button class="border bg-yellow-400 py-1 px-3 rounded-md">Descargar</button>
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
  
  <!-- Nueva sección de comentarios -->
  <section class="mt-8">
    <h2 class="text-2xl font-semibold mb-4">Comentarios</h2>

    @auth
        <form action="{{ route('comentarios.store', $libro) }}" method="POST" class="mb-6">
            @csrf
            <textarea name="comentario" rows="3" class="w-full p-2 border rounded" placeholder="Escribe tu comentario aquí"></textarea>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Enviar comentario</button>
        </form>
    @else
        <p>Inicia sesión para dejar un comentario.</p>
    @endauth
    
    @if($libro->comentarios)
        @foreach($libro->comentarios as $comentario)
            <div class="border p-4 mb-4 rounded">
                <p class="font-bold">{{ $comentario->user->name }}</p>
                <p class="text-sm text-gray-500">{{ $comentario->fecha_comentario }}</p>
                <p class="mt-2">{{ $comentario->comentario }}</p>

                @if(auth()->id() == $comentario->user_id)
                    <div class="mt-2">
                        <button onclick="toggleEditForm({{ $comentario->id }})" class="text-blue-500">Editar</button>
                        <form action="{{ route('comentarios.destroy', $comentario) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                        </form>
                    </div>

                    <form id="edit-form-{{ $comentario->id }}" action="{{ route('comentarios.update', $comentario) }}" method="POST" class="mt-2 hidden">
                        @csrf
                        @method('PUT')
                        <textarea name="comentario" rows="3" class="w-full p-2 border rounded">{{ $comentario->comentario }}</textarea>
                        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                    </form>
                @endif
            </div>
        @endforeach
    @else
        <p>No hay comentarios para este libro.</p>
    @endif
  </section>
</section>

<script>
function toggleEditForm(commentId) {
    const form = document.getElementById(`edit-form-${commentId}`);
    form.classList.toggle('hidden');
}
</script>

@endsection