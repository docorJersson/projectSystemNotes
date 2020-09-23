<?php

namespace App\Http\Controllers;
use App\Course;
use App\Level;
use App\Section;
use App\Degree;
use DB;
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
        $grade=Degree::all();
        $level=Level::all();
        $course=DB::table('courses as c')->join('levels as l','c.idlevel','=','l.idLevel')->join ('grades as g','c.idGrade','=','g.idGrade')->select('c.idCourse','c.codeCourse','c.descriptionCourse','l.descriptionLevel','g.descriptionGrade')->orderby('c.idCourse','asc')->paginate(8);
        return view('Maintainer.MaintainerCourses',['grade'=>$grade,'level'=>$level,'course'=>$course]);
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
