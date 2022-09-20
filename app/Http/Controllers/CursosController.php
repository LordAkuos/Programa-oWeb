<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cursosController extends Controller
{
    public function index(){
        return view('cursos.home');
    }
}
