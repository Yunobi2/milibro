<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{

    public function index(){
        $libros = Libro::all();
    }

    public function show($id){
        return view('show',[
            'libro' => Libro::find($id)
        ]);
    }
}
