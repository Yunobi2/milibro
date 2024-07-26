<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckAdmin;


Route::get('/', 'App\Http\Controllers\LibroController@index');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\LibroController@index')->name('home.index');
Route::get('historial', 'App\Http\Controllers\LibroController@historial')->name('home.historial');
Route::get('/home/{id}', 'App\Http\Controllers\LibroController@show')->name('home.show');
Route::get('/buscar', [LibroController::class, 'buscar'])->name('buscar');

Route::post('/libros/{libro}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::put('/comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.update');
Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');

Route::post('/libros/{libro}/calificar', [CalificacionController::class, 'store'])->name('calificaciones.store');

Route::middleware('auth')->group(function () {
    Route::get('favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('favoritos/{libro}', [FavoritoController::class, 'toggle'])->name('favoritos.toggle');
    Route::get('favoritos/categoria/{categoria}', [FavoritoController::class, 'filtrarPorCategoria'])->name('favoritos.categoria');
});

Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/categoria/{categoria}', [LibroController::class, 'filtrarPorCategoria'])->name('libros.categoria');

Route::middleware(['auth', CheckAdmin::class])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
     Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
     Route::get('/users/create', [DashboardController::class, 'create'])->name('users.create');
     Route::post('/users', [DashboardController::class, 'store'])->name('users.store');
     Route::get('/users/{user}/edit', [DashboardController::class, 'edit'])->name('users.edit');
     Route::put('/users/{user}', [DashboardController::class, 'update'])->name('users.update');
     Route::delete('/users/{user}', [DashboardController::class, 'destroy'])->name('users.destroy');
     Route::get('/books', [DashboardController::class, 'books'])->name('dashboard.books');
     Route::get('/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
     //Route::get('/layouts/inicio', [DashboardController::class, 'inicio'])->name('dashboard.inicio');
     //Route::get('/dashboard/gestion/usuarios', [DashboardController::class, 'gestionUsuarios'])->name('dashboard.gestion.usuarios');
 });
 Route::resource('reportes', ReporteController::class);