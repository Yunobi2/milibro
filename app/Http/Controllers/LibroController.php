<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
}
