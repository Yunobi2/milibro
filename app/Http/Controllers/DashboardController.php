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

    public function users()
    {
        return view('dashboard.users');
    }

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