@extends('layouts.dashboard')

@section('content')
<h2>Añadir Nuevo Usuario</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Crear Usuario</button>
</form>
@endsection
