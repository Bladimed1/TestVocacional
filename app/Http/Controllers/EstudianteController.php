<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public static function index() {
        return view ('index_estudiante');
    }
}
