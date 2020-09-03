<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) //Está recibiendo un parametro de tipo request y lo podemos llamar como querramos lo habitual es llamarlo request como hacer referencia.
    {
        // $request->session()->flush();

        // $request->session()->regenerate();

        // return $request->session()->all(); //Devolvera todos los usuarios que hayan podido logearse en nuesta página.

        return \view('home');
        
    }

}
