<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\detailCapacity;
use DB;

class capacitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Capacities.Capacity');
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
        try{
            DB::beginTransaction();
            $idCourse=$request->get('idCourse');
            $idCapacity=$request->get('idCapacity');
            $idPeriod=$request->get('idPeriod');
            $idOrder=$request->get('order');
            $cont=0;
            while($cont<count($idCourse))
            {
                $detail=new detailCapacity();
                $detail->idCourse=$idCourse[$cont];
                $detail->idCapacity=$idCapacity[$cont];
                $detail->idPeriod=$idPeriod[$cont];
                $detail->orderCapacity=$idOrder[$cont];
                $detail->save();
                $cont=$cont+1;
            }

            DB::commit();
            //return redirect()->route('venta.index')->with('datos','VENTA REALIZADA EXITOSAMENTE...!');
        }
        catch(Exception $e){
            DB::rollback(); 
        }
        return redirect()->route('subjects.index');
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
