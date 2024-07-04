<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('milibro');
});

Auth::routes();

Route::get('/', 'App\Http\Controllers\LibroController@index')->name('home.index');
Route::view('favoritos','favoritos')->name('favoritos');
Route::view('historial', 'historial')->name('historial');
Route::get('/{id}', 'App\Http\Controllers\LibroController@show')->name('home.show');
