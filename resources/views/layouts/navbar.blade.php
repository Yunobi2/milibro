<nav>
        <img src="/milibro.png" alt="logo milibro" class=" w-24">
        <section class="nav-buttons">
            @auth
            <a class="me-2" href="{{url('/home')}}">
                <img src="{{asset('icons/house.svg')}}" class="" alt="icono home">
            </a>
            
            <a class="me-2" href="{{url('/historial')}}">
                <img src="{{asset('icons/history.svg')}}" alt="icono historial">
            </a>
            
            <a class="me-2" href="{{url('/favoritos')}}">
                <img src="{{asset('icons/heart.svg')}}" alt="icono favoritos">
            </a>
            
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
