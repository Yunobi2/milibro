<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <!-- Bootstrap CSS --> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">  --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <nav class="main-nav">
        <img src="/milibro.png" alt="logo milibro" class=" w-24">
        <section class="nav-buttons">
            @auth
            <a class="me-2" href="{{url('/')}}">
                <img title="Home" src="{{asset('icons/house.svg')}}" class="" alt="icono home">
            </a>
            
            <a class="me-2" href="{{url('/historial')}}">
                <img title="Historial" src="{{asset('icons/history.svg')}}" alt="icono historial">
            </a>
            
            <a class="me-2" href="{{url('/favoritos')}}">
                <img title="Favoritos" src="{{asset('icons/heart.svg')}}" alt="icono favoritos">
            </a>
          
            @if (Auth::check() && Auth::user()->rol === 'administrador')
              <a class="me-2" href="{{ route('dashboard') }}">
                <img title="Admin" src="{{ asset('icons/admin.svg') }}" alt="icono administrador">
              </a>
            @endif

            <a class="logout"
                class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf 
            </form>
        @else
        <a class="loginprueba"
        href="{{ route('login') }}"
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
        Iniciar Sesión
        </a>                        
        @endauth
    </section>
</nav>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>