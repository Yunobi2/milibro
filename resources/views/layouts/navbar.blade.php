<nav>
        <h1>MILIBRO</h1>
        <section class="nav-buttons">
            @auth
            <a href="/">Home</a>
            <a class="btn btn-outline-danger me-2" href="#">
                <i class="bi bi-question-circle help"></i>
            </a>
            
            <a class="btn btn-outline-danger me-2" href="#">
                <i class="bi bi-clock-history historial"></i>
            </a>
            
            <a class="btn btn-outline-danger me-2" href="{{url('/favoritos')}}">
                <i class="bi bi-heart heart-icon"></i>
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
        Login
        </a>                        
        @endauth
    </section>
</nav>

<style>
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
    
    }
    .nav-buttons {
        display: flex;
        align-items: center;
    }
</style>