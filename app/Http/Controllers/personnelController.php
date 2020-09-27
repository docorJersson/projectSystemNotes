<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class personnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request)
        {
            // $workers=Worker::where('statusWorker',1)->get();
            // return view('Personnel.main',\compact('workers'));   
            return view('Personnel.main');      
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //el problema era que por defecto un modelo toma la llave por tipo id , entonces estaba comviertiendo el string a id , si el code worker no hubiera sido 001 y hubiera sido CDVA entonces hubiaera habido un desde el principio ya que no podia convertir ese string a un númmero. 
        $worker=Worker::findOrFail($id);
        //,
        return view('Personnel/editPersonnel', compact('worker'));
        // \dd($worker);
        // return \view('Personnel.edit',\compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Worker::findOrFail($id)->update($request->all());
        return redirect()->route('personnel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $worker = Worker::findOrFail($id);
        $worker->statusWorker = 0;
        $worker->save();
        return \redirect()->route('personnel.index');
    }
}
