<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('milibro');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('favoritos','favoritos')->name('favoritos');
Route::view('historial', 'historial')->name('historial');
