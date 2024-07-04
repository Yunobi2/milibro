<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $libros = Libro::get();
        return view('milibro', compact('libros'));
    }

    public function show($id){
        return view('show',[
            'libro' => Libro::find($id)
        ]);
    }
    public function favoritos(){
        $libros = Libro::get();
        return view('favoritos', compact('libros'));
    }

    public function historial(){
        $libros = Libro::get();
        return view('historial', compact('libros'));
    }
}
