<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Estas rutas fueron creadas automaticamente después de que ejecutamos los comandos alteriores

Auth::routes(); //Esta ruta en realidad es un paquete de rutas

Route::get('/home', 'HomeController@index')->name('home'); //está ruta es la que controla al momento de registrarnos -> sería el controlador HomeController

//Por ejemplo una ruta

Route::get('/grade_section', 'MaintainerController@GradesSections');
Route::get('/course_grade', 'MaintainerController@DefCoursesGrades');
Route::resource('/courses', 'CoursesController');
Route::get('/subjects', 'MaintainerController@Capacity');
Route::get('/catedra', 'MaintainerController@Mcatedra');
Route::get('/register_notes', 'MaintainerController@RegisterNotes');

Route::resource('/personnel', 'personnelController');
Route::get('personnel/{id}/destroy', [
    'uses' => 'personnelController@destroy',
    'as'   => 'personnel.destroyed',
]);
