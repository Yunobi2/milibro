<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('milibro');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\LibroController@index')->name('home.index');
Route::view('favoritos','favoritos')->name('favoritos');
Route::view('historial', 'historial')->name('historial');
Route::get('/home/{id}', 'App\Http\Controllers\LibroController@show')->name('home.show');
