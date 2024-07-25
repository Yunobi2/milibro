@extends('layouts.dashboard')

@section('content')
<h2>Editar Usuario</h2>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label for="role">Rol</label>
        <select name="role" class="form-control" required>
            <option value="usuario" {{ $user->role == 'usuario' ? 'selected' : '' }}>Usuario</option>
            <option value="administrador" {{ $user->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Actualizar Usuario</button>
</form>
@endsection