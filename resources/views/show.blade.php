
{{-- cometarios --}}
@extends('layouts.home')

@section('content')
<section class="p-5 mx-20">
  <h2 class="text-2xl">Libro</h2>

    <!-- Botones de accesibilidad -->
  <div class="accesibilidad flex gap-2 my-4">
    <span class="mr-2">Tamaño de texto:</span>
    <button title="Pequeño" class="tamanio-texto px-2 py-1 border rounded" data-size="small">A</button>
    <button title="Mediano" class="tamanio-texto px-2 py-1 border rounded" data-size="medium">A</button>
    <button title="Grande" class="tamanio-texto px-3 py-1 border rounded" data-size="large">A</button>
    <button title="ExtraGrande" class="tamanio-texto px-4 py-1 border rounded" data-size="extra-large">A</button>
  </div>

  <hr>
  <section class="flex m-4">
    <img src="{{ $libro->portada}}" class="w-1/3">

    <div class="w-full p-5">
      <div class="flex justify-between">
        <div class="">
          <h3>{{ $libro->autor }}</h3>
          <h3>{{ $libro->titulo }}</h3>
        </div>
        <div class="flex gap-4 items-center">
          <img id="favorito-icon" 
          class="px-1 w-8 rounded h-12 hover:bg-yellow-300 cursor-pointer" 
          src="{{ $libro->esFavorito(auth()->id()) ? asset('icons/heart-fill.svg') : asset('icons/heart.svg') }}" 
          alt="Favorito" 
          title="Favorito"
          data-libro-id="{{ $libro->id }}">        
          <img class="px-1 w-8 rounded h-12 hover:bg-yellow-300 cursor-pointer" src="{{asset('icons/compartir.svg')}}" alt="">
        </div>
      </div>
      <div>
        <p>{{ $libro->ano }} - {{ $libro->paginas }}</p>
        <p>{{ $libro->categoria }}</p>
        <p>{{ $libro->resumen }}</p>
        <!-- agregar boton de descarga -->
        <!-- agregar a la base de datos la cantidad de descargas -->
        <a href="{{ route('descargar.libro', $libro->id) }}" class="border bg-yellow-400 py-1 px-3 rounded-md no-underline text-black">Descargar</a>
      </div>
    </div>
  </section>
  <h2 class="text-2xl text-center my-2">Opiniones sobre {{ $libro->titulo }}</h2>
  <hr>
  {{-- CALIFICACIÓN --}}
<section class="m-4">
    <h2 class="text-2xl font-semibold mb-4">Calificación</h2>
    
    @auth
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <div id="error-message" class="mb-4 p-4 bg-red-500 text-white rounded" style="display: none;">
            Primero tienes que seleccionar las estrellas.
        </div>

        <form id="rating-form" action="{{ route('calificaciones.store', $libro) }}" method="POST" class="mb-6">
            @csrf
            <div class="flex items-center">
                <span class="mr-2">Tu calificación:</span>
                @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="calificacion" value="{{ $i }}" class="hidden peer">
                    <label for="star{{ $i }}" class="cursor-pointer text-3xl" onclick="highlightStars({{ $i }})">★</label>
                @endfor
            </div>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Enviar calificación</button>
        </form>
    @else
        <p>Inicia sesión para calificar este libro.</p>
    @endauth

    <div class="mt-4">
        <p>Calificación promedio: {{ number_format($libro->calificacionPromedio(), 1) }} / 5</p>
        <p>Basado en {{ $libro->calificaciones->count() }} calificaciones</p>
    </div>
    @php
        $ratingCounts = $libro->calificaciones->groupBy('calificacion')->map->count();
    @endphp
    @for ($i = 5; $i >= 1; $i--)
        <div class="flex items-center">
            <span class="mr-2">{{ $i }} ★</span>
            <span>({{ $ratingCounts[$i] ?? 0 }} calificaciones)</span>
        </div>
    @endfor
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

@endsection


<script>
  console.log("Script is running"); // Para verificar que el script se está ejecutando

  function highlightStars(rating) {
      for (let i = 1; i <= 5; i++) {
          let starLabel = document.querySelector(`label[for="star${i}"]`);
          if (i <= rating) {
              starLabel.classList.add('text-yellow-400');
          } else {
              starLabel.classList.remove('text-yellow-400');
          }
      }
      document.querySelector(`input[name="calificacion"][value="${rating}"]`).checked = true;
  }

  document.addEventListener('DOMContentLoaded', function() {
      console.log("DOMContentLoaded event fired"); // Para verificar que el evento se está disparando
      const form = document.getElementById('rating-form');
      const errorMessage = document.getElementById('error-message');

      if (form) { // Verificar que el formulario existe
          form.addEventListener('submit', function(e) {
              console.log("Form submit event fired"); // Para verificar que el evento submit se está disparando
              const selectedRating = document.querySelector('input[name="calificacion"]:checked');
              if (!selectedRating) {
                  e.preventDefault(); // Previene el envío del formulario
                  errorMessage.style.display = 'block'; // Muestra el mensaje de error
              } else {
                  errorMessage.style.display = 'none'; // Oculta el mensaje de error si se seleccionó una calificación
              }
          });
      } else {
          alert("Form not found"); // Para verificar si el formulario no se encuentra
      }
  });

function toggleEditForm(commentId) {
  const form = document.getElementById(`edit-form-${commentId}`);
  form.classList.toggle('hidden');
}
    
    // Evento DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOMContentLoaded event fired");
        
        // Código para comentarios
        const form = document.getElementById('rating-form');
        const errorMessage = document.getElementById('error-message');
    
        if (form) {
            form.addEventListener('submit', function(e) {
                // ... (código existente) ...
            });
        } else {
            console.log("Form not found");
        }
    
        // Código para favoritos
        const favoritoIcon = document.getElementById('favorito-icon');
        if (favoritoIcon) {
            favoritoIcon.addEventListener('click', function() {
                let libroId = this.dataset.libroId;
                fetch(`/favoritos/${libroId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    this.src = data.isFavorito ? '{{ asset('icons/heart-fill.svg') }}' : '{{ asset('icons/heart.svg') }}';
                })
                .catch(error => console.error('Error:', error));
            });
        } else {
            console.log("Favorito icon not found");
        }
    });
    
    function toggleEditForm(commentId) {
        const form = document.getElementById(`edit-form-${commentId}`);
        form.classList.toggle('hidden');
    }

    // accecibilidad
    document.addEventListener('DOMContentLoaded', function() {
    // ... (tu código existente) ...

    // Código para los ampliadores de texto
        const buttons = document.querySelectorAll('.tamanio-texto');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const size = this.getAttribute('data-size');
                document.body.className = document.body.className.replace(/texto-\S+/g, '');
                document.body.classList.add('texto-' + size);
            });
        });
    });
</script>

