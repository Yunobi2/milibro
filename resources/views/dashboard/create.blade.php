@extends('layouts.dashboard')

@section('content')
<h2>Añadir Nuevo Usuario</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name">Nombre
            <input type="text" name="name" class="form-control" required>
        </label>
    </div>
    <div class="mb-3">
        <label for="email">E-mail
            <input type="email" name="email" class="form-control" required>
        </label>
    </div>
    <div class="mb-3">
        <label for="password">Contraseña
            <input type="password" name="password" class="form-control" required>
        </label>
    </div>
    <!-- agregar el campo rol como deplegable solo para usuario o administrador -->
    <div class="mb-3">
        <label for="rol">Rol
            <select name="rol" class="form-control" required>
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select>
        </label>
    <button type="submit" class="btn btn-success">Crear Usuario</button>
</form>
@endsection
