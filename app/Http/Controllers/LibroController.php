<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

// class LibroController extends Controller
// {

//     public function __construct()
//     {
//         $this->middleware('auth')->except(['index']);
//     }

//     public function index(){
//         $libros = Libro::get();
//         return view('milibro', compact('libros'));
//     }

//     public function show($id){
//         return view('show',[
//             'libro' => Libro::find($id)
//         ]);
//     }
//     public function favoritos(){
//         $libros = Libro::get();
//         return view('favoritos', compact('libros'));
//     }

//     public function historial(){
//         $libros = Libro::get();
//         return view('historial', compact('libros'));
//     }

//     public function buscar(Request $request)
//     {
//         $query = $request->input('q');
//         $libros = Libro::where('titulo', 'like', "%{$query}%")
//             ->orWhere('autor', 'like', "%{$query}%")
//             ->orWhere('resumen', 'like', "%{$query}%")
//             ->orWhere('categoria', 'like', "%{$query}%")
//             ->get();

//         return view('home', compact('libros'));
//     }
// }

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'buscar']);
    }

    public function index()
    {
        $libros = Libro::get();
        return view('milibro', compact('libros'));
    }

    public function show($id)
    {
        // return view('show', [
        //     'libro' => Libro::find($id)
        // ]);

    
        $libro = Libro::with('comentarios.user')->findOrFail($id);
        return view('show', compact('libro'));
    
    }

    public function favoritos()
    {
        $libros = Libro::get();
        return view('favoritos', compact('libros'));
    }

    public function historial()
    {
        $libros = Libro::get();
        return view('historial', compact('libros'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $libros = Libro::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->orWhere('resumen', 'like', "%{$query}%")
            ->orWhere('categoria', 'like', "%{$query}%")
            ->get();

        return view('milibro', compact('libros'));
    }

}