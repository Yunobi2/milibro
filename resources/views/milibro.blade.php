@extends('layouts.home')

@section('content')
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
                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9789500767767_ubzsvunvtrsxlqxj.jpg" width="120" height="200" alt="Where The Crawdads Sing">
                    <p>La casa de los espíritus</p>
                    <p>Isabell Allende</p>
                </a>

                <a class="book" href="/">
                    <img src="https://images.cdn2.buscalibre.com/fit-in/360x360/5f/83/5f8394ec960af22738f91dff6aa88826.jpg" width="120" height="200" alt="Where The Crawdads Sing">
                    <p>La Ciuidad de las Bestias</p>
                    <p>Isabel Allende</p>
                </a>

                <a class="book" href="/">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj3spIjvh_3NM7aLxNIqURK9qQbM9XcR4Sig&s" width="120" height="200" alt="Rich People Problems">
                    <p>El Secreto de las 7 Semillas</p>
                    <p>David Fischman</p>
                </a>

                <a class="book" href="/">
                    <img src="https://images.librotea.com/uploads/media/2024/06/12/criaturas-imposibles.jpeg" width="120" height="200" alt="Crazy Rich Asians">
                    <p>Criaturas Imposibles</p>
                    <p>Katherine Rundell</p>
                </a>

                <a class="book" href="/">
                    <img src="https://m.media-amazon.com/images/I/61bsmg08WbL._AC_UF1000,1000_QL80_.jpg" width="120" height="200" alt="Where The Crawdads Sing">
                    <p>Indigno de ser Humano</p>
                    <p>Osamu Dazai</p>
                </a>

                <a class="book" href="/">
                    <img src="https://images.cdn1.buscalibre.com/fit-in/360x360/f1/9d/f19df10691bba98ba93e49d85a9f2eb2.jpg" width="120" height="200" alt="Rich People Problems">
                    <p>Nuestra señora de París</p>
                    <p>Víctor Hugo</p>
                </a>

                <a class="book" href="/">
                    <img src="https://images.cdn3.buscalibre.com/fit-in/360x360/41/a6/41a665cae10e456979c5475375eb9f2d.jpg" width="120" height="200" alt="Crazy Rich Asians">
                    <p>El mundo de Sofía</p>
                    <p>Jostein Gaarder</p>
            
                </a>
            </div>
            <h2>Populares</h2>
            <div class="book-list">
                <a class="book" href="/">
                    <img src="https://www.casadelaliteratura.gob.pe/wp-content/uploads/2013/11/PortadaLaciudadyLosPerros.jpg" width="120" height="200" alt="All The Light We Cannot See">
                    <p>La ciuidad y los perros</p>
                    <p>Mario Vargas Llosa</p>
                </a>

                <a class="book" href="/">
                    <img src="https://www.crisol.com.pe/media/catalog/product/cache/f6d2c62455a42b0d712f6c919e880845/9/7/9786124262715_u2tkhrweizc2fnar.jpg" width="120" height="200" alt="Where The Crawdads Sing">
                    <p>Los cachorros</p>
                    <p>Mario Vargas Llosa</p>
                </a>

                <a class="book" href="/">
                    <img src="https://www.ellibrototal.com/testLtotal/CARATULAS/libros/2020/1/14980.jpg"  width="120" height="200" alt="Rich People Problems">
                    <p>Paco Yunque</p>
                    <p>César Vallejo</p>
                </a>

                <a class="book" href="/">
                    <img src="https://images.cdn1.buscalibre.com/fit-in/360x360/13/cb/13cbee68edbcfe3923cf005975b219cf.jpg" width="120" height="200" alt="Crazy Rich Asians">
                    <p>Sangre de Campeón</p>
                    <p>Carlos Cuauhtémoc</p>
            
                </a>

                <a class="book" href="/">
                    <img src="https://xn--per-boa.pe/wp-content/uploads/2023/04/El-Caballero-Carmelo.jpg" width="120" height="200" alt="Where The Crawdads Sing">
                    <p>El Caballero Carmelo</p>
                    <p>Abraham Valdelomar</p>
                </a>

                <a class="book" href="/">
                    <img src="https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1668516406-514hltLWVcL._SL500_.jpg?crop=1xw:1xh;center,top&resize=980:*" width="120" height="200" alt="Rich People Problems">
                    <p>El bosque de los susurros</p>
                    <p>Greg Howard</p>
                </a>

                <a class="book" href="/">
                    <img src="https://www.infobae.com/new-resizer/gvtt1qXAS4BlGVE1pgPc02h4XVA=/1200x1800/filters:format(webp):quality(85)/s3.amazonaws.com/arc-wordpress-client-uploads/infobae-wp/wp-content/uploads/2016/07/20201800/mejores-libros-Don-Quijote-sf.jpg" width="120" height="200" alt="Crazy Rich Asians">
                    <p>Don Quijote de la Mancha</p>
                    <p>Miguel de Cervantes</p>
            
                </a>
        </div>
    </section>
</main>
@endsection