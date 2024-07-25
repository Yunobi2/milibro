@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="d-flex">
    <main class="p-4 flex-grow-1">
        <h2 class="mb-4">SISTEMA BIBLIOTECARIO - GESTIÓN DE USUARIOS</h2>
        <div class="mb-3">
            <input type="text" placeholder="Ingrese email o ID" class="form-control">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Configurar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
        
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Usuario</td>
                    <!-- <td><a href="{{ route('users.edit', $user) }}" class="btn btn-primary">⚙️</a></td> -->
                    <td>
                        <!-- <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;"> -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">✖️</button>
                        </form>
                    </td>
                </tr>
                @endforeach 

            </tbody>
        </table>
        <!-- <a href="{{ route('users.create') }}" class="btn btn-success">Añadir Nuevo Usuario</a> -->
    </main>
</div>
@endsection