<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function index (){

         // Recebe os dados do formulário
    
    $array = [1, 2];

    // Passa os dados dos repositórios para a view
    return view('buscar', ['array' => $array]);
    }
    
}
