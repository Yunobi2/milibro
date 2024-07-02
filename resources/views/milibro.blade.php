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
</head>

<body>
   <header>
        @if (Route::has('login'))
            @include('layouts.navbar')
        @endif
   </header>

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
                   <a class="book" href="/">
                       <img src="data:image/jpeg;base64,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" alt="All The Light We Cannot See">
                       <p>Harry Potter y la piedra filosofal</p>
                       <p>J.K. Rowling</p>
                   </a>

                   <a class="book" href="/">
                       <img src="https://images.cdn2.buscalibre.com/fit-in/360x360/5f/83/5f8394ec960af22738f91dff6aa88826.jpg" alt="Where The Crawdads Sing">
                       <p>La Ciuidad de las Bestias</p>
                       <p>Isabel Allende</p>
                   </a>

                   <a class="book" href="/">
                       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj3spIjvh_3NM7aLxNIqURK9qQbM9XcR4Sig&s" alt="Rich People Problems">
                       <p>El Secreto de las 7 Semillas</p>
                       <p>David Fischman</p>
                   </a>

                   <a class="book" href="/">
                       <img src="https://images.librotea.com/uploads/media/2024/06/12/criaturas-imposibles.jpeg" alt="Crazy Rich Asians">
                       <p>Criaturas Imposibles</p>
                       <p>Katherine Rundell</p>
                   </a>

                    <a class="book" href="/">
                        <img src="https://m.media-amazon.com/images/I/61bsmg08WbL._AC_UF1000,1000_QL80_.jpg" alt="Where The Crawdads Sing">
                        <p>Indigno de ser Humano</p>
                        <p>Osamu Dazai</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </a>
               </div>
               <h2>Populares</h2>
               <div class="book-list">
                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="All The Light We Cannot See">
                        <p>All The Light We Cannot See</p>
                        <p>By Anthony Doerr</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                        <p>Where The Crawdads Sing</p>
                        <p>By Delia Owens</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Where The Crawdads Sing">
                        <p>Where The Crawdads Sing</p>
                        <p>By Delia Owens</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Rich People Problems">
                        <p>Rich People Problems</p>
                        <p>By Kevin Kwan</p>
                    </a>

                    <a class="book" href="/">
                        <img src="https://via.placeholder.com/150x200" alt="Crazy Rich Asians">
                        <p>Crazy Rich Asians</p>
                        <p>By Kevin Kwan</p>
                
                    </a>
           </div>
       </section>
   </main>
   <script src="{{ asset('JS/sololetras.js') }}"></script>
</body>

</html>