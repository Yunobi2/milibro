<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye tus estilos CSS aquí -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    @include('layouts.app')
    <div class="d-flex">
        <aside style="width: 250px; background-color: #fef7eb; border-right: 2px solid rgba(0, 0, 0, 0.1); box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);">
            <div class="text-center mb-4">
                <img src=/libros.png alt="logo" class="img-fluid">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-black {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <img title="Inicio" src="{{asset('icons/inicio.svg')}}" alt="icono de inicio"> INICIO
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <img title="Gestión de Usuarios" src="{{asset('icons/usuario_edit.svg')}}" alt="icono gestion de usuario"> GESTIÓN DE USUARIOS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black {{ request()->routeIs('dashboard.books') ? 'active' : '' }}" href="{{ route('dashboard.books') }}">
                        <img title="Gestión de Libros" src="{{asset('icons/libros.svg')}}" alt="icono gestion de libros"> GESTIÓN DE LIBROS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black {{ request()->routeIs('dashboard.reports') ? 'active' : '' }}" href="{{ route('dashboard.reports') }}">
                        <img title="Reportes" src="{{asset('icons/reporte.svg')}}" alt="icono de reportes"> REPORTES
                    </a>
                </li>
            </ul>
        </aside>
       @yield('content')
    </div>

    <!-- Incluye Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Incluye tus scripts JS aquí -->
    <!-- <script src="{{ asset('js/scripts.js') }}"></script> -->
</body>
</html>