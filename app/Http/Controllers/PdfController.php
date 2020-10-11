<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PdfController extends Controller
{
   public function reporteanual(Request $request)
   {

    $idteacher=$request->codigo;
    $idgrade=$request->grade;
    $idcourse=$request->course;
    $idsection=$request->section;
    $idperiod=$request->period;

    $teacher=DB::table('detailTeachers as dt')
    ->join('sections as sc','dt.idSection','=','sc.idSection')
    ->join('courses as co','co.idCourse','=','dt.idCourse')
    ->join('grades  as gd','co.idGrade','=','gd.idGrade')
    ->join('periodsYear as py','py.idPeriod','=','dt.idPeriod')
    ->join('teachers as t','dt.codeTeacher','=','t.codeTeacher')
    ->join('workers as w','t.codeWorker','=','w.codeWorker')
    ->select(DB::raw('distinct w.nameWorker,w.lastNameWorker,gd.descriptionGrade,co.descriptionCourse, sc.descriptionSection'))
    ->where('w.codeWorker','=',$idteacher)
    ->where('gd.idGrade','=',$idgrade)
    ->where('co.idCourse','=',$idcourse)
    ->where('sc.idSection','=',$idsection)
    ->get();

    $note=DB::table('notes as n')
    ->join('detailCapacities as dc','n.idDetailCapacity','=','dc.idDetailCapacity')
    ->join('capacities as cp','cp.idCapacity','=','dc.idCapacity')
    ->join('detailStudents as ds','n.idDetailStudent','=','ds.idDetailStudent')
    ->join('students as s','s.codeStudent','=','ds.codeStudent')
    ->join('detailTeachers as dt','dt.idDetailTeacher','=','ds.idDetailTeacher')
    ->join('sections as sc','dt.idSection','=','sc.idSection')
    ->join('courses as co','co.idCourse','=','dt.idCourse')
    ->join('grades  as gd','co.idGrade','=','gd.idGrade')
    ->join('periodsYear as py','py.idPeriod','dt.idPeriod')
    ->join('teachers as t','dt.codeTeacher','=','t.codeTeacher')
    ->join('workers as w','t.codeWorker','=','w.codeWorker')
    ->select(DB::raw('s.nameStudent,py.bimester as bimester,convert(decimal(4,1),avg(n.note)) as note'))
    ->where('w.codeWorker','=',$idteacher)
    ->where('dt.idPeriod','=',$idperiod)
    ->where('co.idCourse','=',$idcourse)
    ->where('gd.idGrade','=',$idgrade)
    ->where('sc.idSection','=',$idsection)
    ->groupBy('s.nameStudent','py.bimester')
    ->get();



        // $teacher=$request->cdteacher;
        $pdf = \PDF::loadView('registro',compact('teacher','note'));
        return $pdf->download('registro.pdf');
   }
}

