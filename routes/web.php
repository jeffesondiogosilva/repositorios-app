<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\apiController;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {   

    return view('welcome');
});



Route::post('/buscar', function (Request $request) {
    $nome = $request->input('nome');
    $client = new Client();
    $response = $client->get("https://api.github.com/users/$nome/repos");    
    $repositorios = json_decode($response->getBody());
    for ($i = 0; $i < 10; $i++) {
        print_r($repositorios[$i]->name.'<pre>');
  
    }

    $request->session()->put('var', 'value');

    return view('salvar');
    
})->name('buscar');


Route::get('salvar', function(Request $request){
    $var = $request->session()->get('var');
    $cl = new Client();
        $res = $cl->get("https://api.github.com/users/$var/)/commits");
        $commits = json_decode($res->getBody());

        print_r($commits);
    Repositorio:
    return view('salvar', compact('var'));
});