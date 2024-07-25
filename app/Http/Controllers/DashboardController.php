<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Libro; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBooks = Libro::count();
        return view('dashboard.index', compact('totalUsers', 'totalBooks'));
    }
################################################################################################
    public function users()
    {
        // Obtener usuarios
        $users = User::get();
        
        // Crear vista
        return view('dashboard.users', compact('users'));
    }

    // Agregar las funciones del UserController aquí
    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'rol' => 'required|in:usuario,administrador', // Validación para el rol
            'password' => 'required|min:6',
        ]);
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol, // Guardar el rol
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $user)
    {
        return view('dashboard.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'rol' => 'required|in:usuario,administrador', // Validación para el rol
        ]);

        $user->update($request->only('name', 'email', 'rol')); // Incluir 'rol' en la actualización

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
##############################################################################################################
    public function books()
    {
        return view('dashboard.books');
    }

    public function reports()
    {
        return view('dashboard.reports');
    }

    public function inicio()
    {
        return view('layouts.inicio');
    }

    public function gestionUsuarios()
    {
        return view('dashboard.gestion_usuarios');
    }
}