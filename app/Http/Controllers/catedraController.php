<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Level;
use App\Degree;
use App\Period;
use App\detailTeacher;
use DB;

class catedraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Catedra/MaintainerCatedra');
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
        try{
        DB::beginTransaction();
            $idCourse=$request->get('idCourse');
            $idSection=$request->get('idSection');
            $idPeriod=$request->get('idPeriod');
            $cont=0;
            while($cont<count($idCourse))
            {
                $detail=new detailTeacher();
                $detail->codeWorker=$request->codeWorkerAl;
                $detail->codeTeacher=$request->codeTeacher;
                $detail->idCourse=$idCourse[$cont];
                $detail->idSection=$idSection[$cont];
                $detail->idPeriod=$idPeriod[$cont];
                $detail->save();
                $cont=$cont+1;
            }

            DB::commit();
            //return redirect()->route('venta.index')->with('datos','VENTA REALIZADA EXITOSAMENTE...!');
        }
        catch(Exception $e){
            DB::rollback(); 
        }
        return redirect()->route('catedra.index');
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
        // $t=Worker::findOrFail($id);
        // // dd($t);
        // return \view('Catedra/MaintainerCatedra', \compact('t'));
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
    }
}
