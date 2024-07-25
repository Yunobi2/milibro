@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<script src="{{ asset('js/confirmDelete.js') }}"></script>
<script src="{{ asset('js/editUser.js') }}"></script>
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
                    <td>{{ $user->rol }}</td>
                    <td>
                        <button type="button" class="btn btn-primary edit-button" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}" data-user-rol="{{ $user->rol }}">⚙️</button>
                    </td> 
                    <td>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-button" data-user-id="{{ $user->id }}">✖️</button>
                        </form>
                    </td>
                </tr>
                @endforeach 
   
            </tbody>
        </table>
        <a href="{{ route('users.create') }}" class="btn btn-success">Añadir Nuevo Usuario</a>
    </main>
</div>
   
<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>
   
<!-- Modal de Edición de Usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editUserName">Nombre</label>
                        <input type="text" class="form-control" id="editUserName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">E-mail</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editUserRol">Rol</label>
                        <input type="text" class="form-control" id="editUserRol" name="rol">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection