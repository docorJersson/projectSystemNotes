<?php

use Illuminate\Support\Facades\Route;

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
    // $user=Auth::user();
    // if($user->isAdmin()){
    //     echo "Eres usuario Administrador";
    // }else{
    //     echo "Eres Docente";
    // }
    return view('welcome');
});

// Estas rutas fueron creadas automaticamente después de que ejecutamos los comandos alteriores

Auth::routes(); //Esta ruta en realidad es un paquete de rutas

Route::get('/home', 'HomeController@index')->name('home'); //está ruta es la que controla al momento de registrarnos -> sería el controlador HomeController

//Por ejemplo una ruta
