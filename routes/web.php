<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\LibroController@index');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\LibroController@index')->name('home.index');
Route::view('favoritos','favoritos')->name('favoritos');
Route::view('historial', 'historial')->name('historial');
Route::get('/home/{id}', 'App\Http\Controllers\LibroController@show')->name('home.show');
