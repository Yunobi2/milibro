<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ComentarioController;

Route::get('/', 'App\Http\Controllers\LibroController@index');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\LibroController@index')->name('home.index');
Route::get('favoritos','App\Http\Controllers\LibroController@favoritos')->name('home.favoritos');
Route::get('historial', 'App\Http\Controllers\LibroController@historial')->name('home.historial');
Route::get('/home/{id}', 'App\Http\Controllers\LibroController@show')->name('home.show');
Route::get('/buscar', [LibroController::class, 'buscar'])->name('buscar');

Route::post('/libros/{libro}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::put('/comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.update');
Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');