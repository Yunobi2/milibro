@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<script src="{{ asset('js/confirmDelete.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="d-flex flex-grow-1">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-rol="{{ $user->rol }}">⚙️</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $user->id }}">✖️</button>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createUserModal">Añadir Nuevo Usuario</a>
    </main>
</div>

<!-- Modal para crear nuevo usuario -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Crear Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createModalName">Nombre</label>
                        <input type="text" class="form-control" id="createModalName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalEmail">E-mail</label>
                        <input type="email" class="form-control" id="createModalEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalPassword">Contraseña</label>
                        <input type="password" class="form-control" id="createModalPassword" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalRole">Rol</label>
                        <select class="form-control" id="createModalRole" name="rol" required>
                            <option value="usuario">Usuario</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editUserForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalName">Nombre</label>
                        <input type="text" class="form-control" id="modalName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="modalEmail">E-mail</label>
                        <input type="email" class="form-control" id="modalEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="modalRole">Rol</label>
                        <select class="form-control" id="modalRole" name="rol" required>
                            <option value="usuario">Usuario</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para eliminar usuario -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este usuario?
            </div>
            <div class="modal-footer">
                <form id="deleteUserForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var email = button.data('email');
        var rol = button.data('rol');
        
        var modal = $(this);
        modal.find('#modalName').val(name);
        modal.find('#modalEmail').val(email);
        modal.find('#modalRole').val(rol);
        modal.find('#editUserForm').attr('action', '/users/' + id);
    });

    $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        
        var modal = $(this);
        modal.find('#deleteUserForm').attr('action', '/users/' + id);
    });

    $('.delete-button').on('click', function() {
        var userId = $(this).data('user-id');
        $('#deleteUserModal').modal('show');
        $('#deleteUserModal').find('#deleteUserForm').attr('action', '/users/' + userId);
    });
</script>
@endsection