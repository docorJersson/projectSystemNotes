<?php

namespace App\Http\Controllers;

use App\Capacity;
use App\Course;
use App\Level;
use App\Section;
use App\Degree;
use App\detailCapacity;
use App\detailTeacher;
use App\Period;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Maintainer.MaintainerCourses');
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


    public function edit($id)
    {

        $dt = detailTeacher::findOrFail($id);
        $course = Course::findOrFail($dt->idCourse);
        $capacities = $course->capacities()->where('idPeriod', $dt->periodYears->idPeriod)->orderBy('orderCapacity')->get();
        return view('Maintainer.EditCourses', compact('course', 'dt', 'capacities'));
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
