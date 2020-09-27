<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Level;
use App\Degree;
use App\Worker;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('courses', function () {
    return datatables()->of(DB::select('exec courseTeacher ?', array(date('Y'))))->addColumn('acciones', 'Maintainer.accionesTabla')->rawColumns(['acciones'])->toJson();
});

Route::get('personnel', function () {
    return datatables(
    DB::select('select codeWorker,nameWorker,lastNameWorker,dniWorker,addressWorker,civilStatus,telephone,socialSecurity,dateWorker from workers
    where statusWorker=1')
    )
    ->addColumn('btn','Personnel/actions')
    ->rawColumns(['btn'])
    ->toJson();
});
