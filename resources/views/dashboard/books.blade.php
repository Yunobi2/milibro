@extends('layouts.dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesadmi.css') }}">
<div class="d-flex flex-column flex-grow-1">
    <main class="p-4 flex-grow-1">
        <h2 class="mb-4">SISTEMA BIBLIOTECARIO-GESTIÓN DE LIBROS</h2>
        
        <!-- Apartados -->
        <div class="mb-3">
            <button class="btn btn-primary">Lista de Libros</button>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#createBookModal">Agregar libro</button>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#createCategoryModal">Agregar categoría</button>
        </div>

        <!-- Barra de búsqueda -->
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Ingrese Título o ID" aria-label="Buscar">
        </div>

        <!-- Tabla de Libros -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor(es)</th>
                        <th>Páginas</th>
                        <th>Año</th>
                        <th>Categoría</th>
                        <th>Editorial</th>
                        <th>Resumen</th>
                        <th>Portada</th>
                        <th>PDF</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr class="[&>td]:max-w-48 [&>td]:overflow-hidden">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->titulo }}</td>
                        <td>{{ $book->autor }}</td>
                        <td>{{ $book->paginas }}</td>
                        <td>{{ $book->ano }}</td>
                        <td>{{ $book->editorial }}</td>
                        <td>{{ $book->categoria }}</td>
                        <td class="line-clamp-3">{{ $book->resumen }}</td>
                        <td >{{ $book->portada }}</td>
                        <td><a href="/storage/{{ $book->pdf }}" target="_blank">Ver PDF del Libro</a></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editBookModal" data-id="{{ $book->id }}" data-titulo="{{ $book->titulo }}" data-autor="{{ $book->autor }}" data-paginas="{{ $book->paginas }}" data-ano="{{ $book->ano }}" data-editorial="{{ $book->editorial }}" data-categoria="{{ $book->categoria }}" data-resumen="{{ $book->resumen }}" data-portada="{{ $book->portada }}" data-pdf="{{ $book->pdf }}" >✏️</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#deleteBookModal" data-id="{{ $book->id }}">❌</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createBookModal">Añadir Nuevo Libro</a>
        </div>
    </main>
</div>

<!-- Modal para crear nuevo libro -->
<div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="createBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBookModalLabel">Crear Nuevo Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createBookForm" action="{{ route('libros.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createModalTitulo">Título</label>
                        <input type="text" class="form-control" id="createModalTitulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalAutor">Autor</label>
                        <input type="text" class="form-control" id="createModalAutor" name="autor" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalPaginas">Páginas</label>
                        <input type="number" class="form-control" id="createModalPaginas" name="paginas" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalAno">Año</label>
                        <input type="number" class="form-control" id="createModalAno" name="ano" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalEditorial">Editorial</label>
                        <input type="text" class="form-control" id="createModalEditorial" name="editorial">
                    </div>
                    <div class="form-group">
                        <label for="createModalCategoria">Categoría</label>
                        <input type="text" class="form-control" id="createModalCategoria" name="categoria" required>
                    </div>
                    <div class="form-group">
                        <label for="createModalResumen">Resumen</label>
                        <textarea class="form-control" id="createModalResumen" name="resumen"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="createModalPortada">Portada</label>
                        <input type="text" class="form-control" id="createModalPortada" name="portada">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear Libro</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar libro -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">Editar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editBookForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalTitulo">Título</label>
                        <input type="text" class="form-control" id="modalTitulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="modalAutor">Autor</label>
                        <input type="text" class="form-control" id="modalAutor" name="autor" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPaginas">Páginas</label>
                        <input type="number" class="form-control" id="modalPaginas" name="paginas" required>
                    </div>
                    <div class="form-group">
                        <label for="modalAno">Año</label>
                        <input type="number" class="form-control" id="modalAno" name="ano" required>
                    </div>
                    <div class="form-group">
                        <label for="modalEditorial">Editorial</label>
                        <input type="text" class="form-control" id="modalEditorial" name="editorial">
                    </div>
                    <div class="form-group">
                        <label for="modalCategoria">Categoría</label>
                        <input type="text" class="form-control" id="modalCategoria" name="categoria" required>
                    </div>
                    <div class="form-group">
                        <label for="modalResumen">Resumen</label>
                        <textarea class="form-control" id="modalResumen" name="resumen"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="modalPortada">Portada</label>
                        <input type="text" class="form-control" id="modalPortada" name="portada">
                    </div>
                    <div class="form-group">
                        <label for="modalPdf">PDF del Libro</label>
                        <input type="file" class="form-control" id="modalPdf" name="pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Actualizar Libro</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal para eliminar libro -->
<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBookModalLabel">Eliminar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteBookForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar este libro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para crear nueva categoría -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Crear Nueva Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createCategoryForm" action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createModalCategoriaNombre">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="createModalCategoriaNombre" name="nombre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#editBookModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var titulo = button.data('titulo');
        var autor = button.data('autor');
        var paginas = button.data('paginas');
        var ano = button.data('ano');
        var editorial = button.data('editorial');
        var categoria = button.data('categoria');
        var resumen = button.data('resumen');
        var portada = button.data('portada');
        
        var modal = $(this);
        modal.find('#editBookForm').attr('action', '/libros/' + id);
        modal.find('#modalTitulo').val(titulo);
        modal.find('#modalAutor').val(autor);
        modal.find('#modalPaginas').val(paginas);
        modal.find('#modalAno').val(ano);
        modal.find('#modalEditorial').val(editorial);
        modal.find('#modalCategoria').val(categoria);
        modal.find('#modalResumen').val(resumen);
        modal.find('#modalPortada').val(portada);
        console.log(id, titulo, autor, paginas, ano, editorial, categoria, resumen, portada);
    });

    $('#deleteBookModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('#deleteBookForm').attr('action', '/libros/' + id);
    });
});
</script>

@endsection