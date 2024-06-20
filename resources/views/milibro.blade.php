<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
   <link
   href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
   rel="stylesheet"
   />
   <!-- Font Awesome CSS -->
   <link
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   rel="stylesheet"
   />
   <title>MILIBRO - Libro Virtual</title>
   <link rel="stylesheet" href="styles.css">
</head>

<body>
   <header>
       <div class="container">
           <div class="logo">MILIBRO</div>

                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a class="btn btn-outline-danger me-2" href="#">
                                <i class="bi bi-question-circle help"></i>
                            </a>

                            <a class="btn btn-outline-danger me-2" href="#">
                                <i class="bi bi-clock-history historial"></i>
                            </a>

                            <a class="btn btn-outline-danger me-2" href="#">
                                <i class="bi bi-heart-fill heart-icon"></i>
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
                    </nav>
                @endif
       </div>
   </header>

   <main>
        <section class="hero">
           <div class="hero-banner">
              
               <div class="banner-text">
                   <h1>Welcome to MILIBRO</h1>
                   <p>Discover a world of books at your fingertips</p>
               </div>
           </div>
           <div class="hero-text">
               <p>Encuentra tu libro favorito y lealo aquí gratis</p>
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
                   <div class="book">
                       <img src="https://via.placeholder.com/150x200" alt="All The Light We Cannot See">
                       <p>All The Light We Cannot See</p>
                       <p>By Anthony Doerr</p>
                   </div>

                   <div class="book">
                       <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                       <p>Where The Crawdads Sing</p>
                       <p>By Delia Owens</p>
                   </div>

                   <div class="book">
                       <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                       <p>Rich People Problems</p>
                       <p>By Kevin Kwan</p>
                   </div>

                   <div class="book">
                       <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                       <p>Crazy Rich Asians</p>
                       <p>By Kevin Kwan</p>
               
                   </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                        <p>Where The Crawdads Sing</p>
                        <p>By Delia Owens</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </div>
               </div>
               <h2>Populares</h2>
               <div class="book-list">
                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="All The Light We Cannot See">
                        <p>All The Light We Cannot See</p>
                        <p>By Anthony Doerr</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                        <p>Where The Crawdads Sing</p>
                        <p>By Delia Owens</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                        <p>Where The Crawdads Sing</p>
                        <p>By Delia Owens</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </div>

                    <div class="book">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </div>
           </div>
       </section>
   </main>
   <script src="{{ asset('JS/sololetras.js') }}"></script>
</body>

</html>


