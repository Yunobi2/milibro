@extends('layouts.dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="p-4 space-y-8">
    <h1 class="text-2xl font-bold">Reportes de Favoritos</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Gráfico: Libros más añadidos a favoritos -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold">Libros más añadidos a favoritos</h3>
            <ul class="list-disc ml-5">
                @foreach($librosMasFavoritos as $libro)
                    <li>{{ $libro->titulo }} ({{ $libro->total_favoritos }} favoritos)</li>
                @endforeach
            </ul>
            <canvas id="librosMasFavoritosChart"></canvas>
        </div>

        <!-- Gráfico: Usuarios con más libros favoritos -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold">Usuarios con más libros favoritos</h3>
            <ul class="list-disc ml-5">
                @foreach($usuariosMasFavoritos as $usuario)
                    <li>{{ $usuario->name }} ({{ $usuario->total_favoritos }} libros favoritos)</li>
                @endforeach
            </ul>
            <canvas id="usuariosMasFavoritosChart"></canvas>
        </div>

        <!-- Gráfico: Categorías con más libros favoritos -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold">Categorías con más libros favoritos</h3>
            <ul class="list-disc ml-5">
                @foreach($categoriasMasFavoritas as $categoria)
                    <li>{{ $categoria->categoria }} ({{ $categoria->total_favoritos }} favoritos)</li>
                @endforeach
            </ul>
            <canvas id="categoriasMasFavoritasChart"></canvas>
        </div>

        <!-- Gráfico: Relación entre favoritos y descargas -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold">Relación entre favoritos y descargas</h3>
            <ul class="list-disc ml-5">
                @foreach($favoritosDescargasRelacion as $relacion)
                    <li>{{ $relacion->titulo }}: {{ $relacion->total_favoritos }} favoritos, {{ $relacion->total_descargas }} descargas</li>
                @endforeach
            </ul>
            <canvas id="favoritosDescargasRelacionChart"></canvas>
        </div>

        <!-- Gráfico: Usuarios con más descargas -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold">Usuarios con más descargas</h3>
            <ul class="list-disc ml-5">
                @foreach($usuariosMasActivosDescargas as $usuario)
                    <li>{{ $usuario->name }} ({{ $usuario->total_descargas }} descargas)</li>
                @endforeach
            </ul>
            <canvas id="usuariosMasActivosDescargasChart"></canvas>
        </div>
    
        <div class="bg-white shadow-md rounded-lg p-4">
        <h3>Libros Más Comentados</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Total Comentarios</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($librosMasComentados as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->total_comentarios }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Gráfico: Libros Más Comentados -->
        <canvas id="librosMasComentadosChart" width="400" height="200"></canvas>
    </div>

    <!-- Tabla: Usuarios Más Activos en Comentarios -->
    <div class="bg-white shadow-md rounded-lg p-4">
    <h3>Usuarios Más Activos en Comentarios</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Total Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuariosMasComentadores as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->total_comentarios }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <canvas id="usuariosMasComentadoresChart" width="400" height="200"></canvas>
    </div>

    <!-- Gráfico: Usuarios Más Activos en Comentarios -->

    <!-- Tabla: Libros Mejor Calificados -->
    <div class="bg-white shadow-md rounded-lg p-4">
    <h3>Libros Mejor Calificados</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Calificación Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($librosMejorCalificados as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ number_format($libro->calificacion_promedio, 2) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <canvas id="librosMejorCalificadosChart" width="400" height="200"></canvas>
    </div>

    <!-- Gráfico: Libros Mejor Calificados -->

    <!-- Tabla: Distribución de Calificaciones por Libro -->
     <div>

         <h3>Distribución de Calificaciones por Libro</h3>
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>Libro ID</th>
                     <th>Calificación</th>
                     <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distribucionCalificaciones as $distribucion)
                    <tr>
                        <td>{{ $distribucion->libro_id }}</td>
                        <td>{{ $distribucion->calificacion }}</td>
                        <td>{{ $distribucion->cantidad }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Gráfico: Distribución de Calificaciones -->
            <canvas id="distribucionCalificacionesChart" width="400" height="200"></canvas>
        </div>

    <!-- Tabla: Usuarios Más Activos (Descargas y Comentarios) -->
    <div class="bg-white shadow-md rounded-lg p-4">
    <h3>Usuarios Más Activos (Descargas y Comentarios)</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Total Descargas</th>
                <th>Total Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuariosMasActivos as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->total_descargas }}</td>
                <td>{{ $usuario->total_comentarios }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Gráfico: Usuarios Más Activos -->
    <canvas id="usuariosMasActivosChart" width="400" height="200"></canvas>
    </div>
    </div>
</div>

<script>
    // Datos para el gráfico de Libros más añadidos a favoritos
    const librosMasFavoritosLabels = @json($librosMasFavoritos->pluck('titulo'));
    const librosMasFavoritosData = @json($librosMasFavoritos->pluck('total_favoritos'));

    new Chart(document.getElementById('librosMasFavoritosChart'), {
        type: 'bar',
        data: {
            labels: librosMasFavoritosLabels,
            datasets: [{
                label: 'Favoritos',
                data: librosMasFavoritosData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Datos para el gráfico de Usuarios con más libros favoritos
    const usuariosMasFavoritosLabels = @json($usuariosMasFavoritos->pluck('name'));
    const usuariosMasFavoritosData = @json($usuariosMasFavoritos->pluck('total_favoritos'));

    new Chart(document.getElementById('usuariosMasFavoritosChart'), {
        type: 'bar',
        data: {
            labels: usuariosMasFavoritosLabels,
            datasets: [{
                label: 'Libros Favoritos',
                data: usuariosMasFavoritosData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Datos para el gráfico de Categorías con más libros favoritos
    const categoriasMasFavoritasLabels = @json($categoriasMasFavoritas->pluck('categoria'));
    const categoriasMasFavoritasData = @json($categoriasMasFavoritas->pluck('total_favoritos'));

    new Chart(document.getElementById('categoriasMasFavoritasChart'), {
        type: 'pie',
        data: {
            labels: categoriasMasFavoritasLabels,
            datasets: [{
                data: categoriasMasFavoritasData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

    // Gráfico: Libros Más Comentados
    var ctx = document.getElementById('librosMasComentadosChart').getContext('2d');
    var librosMasComentadosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($librosMasComentados->pluck('titulo')) !!},
            datasets: [{
                label: 'Total Comentarios',
                data: {!! json_encode($librosMasComentados->pluck('total_comentarios')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico: Usuarios Más Activos en Descargas
    var ctx = document.getElementById('usuariosMasActivosDescargasChart').getContext('2d');
    var usuariosMasActivosDescargasChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($usuariosMasActivosDescargas->pluck('name')) !!},
            datasets: [{
                label: 'Total Descargas',
                data: {!! json_encode($usuariosMasActivosDescargas->pluck('total_descargas')) !!},
            }]
        }
    });

    // Gráfico: Usuarios Más Activos en Comentarios
    var ctx = document.getElementById('usuariosMasComentadoresChart').getContext('2d');
    var usuariosMasComentadoresChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($usuariosMasComentadores->pluck('name')) !!},
            datasets: [{
                label: 'Total Comentarios',
                data: {!! json_encode($usuariosMasComentadores->pluck('total_comentarios')) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico: Libros Mejor Calificados
    var ctx = document.getElementById('librosMejorCalificadosChart').getContext('2d');
    var librosMejorCalificadosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($librosMejorCalificados->pluck('titulo')) !!},
            datasets: [{
                label: 'Calificación Promedio',
                data: {!! json_encode($librosMejorCalificados->pluck('calificacion_promedio')) !!},
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico: Distribución de Calificaciones
    var ctx = document.getElementById('distribucionCalificacionesChart').getContext('2d');
    var distribucionCalificacionesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($distribucionCalificaciones->pluck('calificacion')) !!},
            datasets: [{
                label: 'Cantidad',
                data: {!! json_encode($distribucionCalificaciones->pluck('cantidad')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico: Usuarios Más Activos (Descargas y Comentarios)
    var ctx = document.getElementById('usuariosMasActivosChart').getContext('2d');
    var usuariosMasActivosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($usuariosMasActivos->pluck('name')) !!},
            datasets: [{
                label: 'Total Descargas',
                data: {!! json_encode($usuariosMasActivos->pluck('total_descargas')) !!},
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            },
            {
                label: 'Total Comentarios',
                data: {!! json_encode($usuariosMasActivos->pluck('total_comentarios')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Datos para el gráfico de Relación entre favoritos y descargas
    const favoritosDescargasRelacionLabels = @json($favoritosDescargasRelacion->pluck('titulo'));
    const favoritosData = @json($favoritosDescargasRelacion->pluck('total_favoritos'));
    const descargasData = @json($favoritosDescargasRelacion->pluck('total_descargas'));

    new Chart(document.getElementById('favoritosDescargasRelacionChart'), {
        type: 'bar',
        data: {
            labels: favoritosDescargasRelacionLabels,
            datasets: [{
                label: 'Favoritos',
                data: favoritosData,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }, {
                label: 'Descargas',
                data: descargasData,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
