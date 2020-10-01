<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;
use App\Section;
use App\Course;
use App\Period;
use DB;

class levelController extends Controller
{
    //
    public function byDegree($id){
       return Degree::where('idLevel',$id)->get();
    }

    public function bySection($id){
       return Section::where('idGrade',$id)->get();
    }

    public function byCourse($id){
       return Course::where('idGrade',$id)->get();
    }
    //obtenemos el bimestre
    public function byBimester($year){
      return Period::select('idPeriod','bimester')->where('yearPeriod',$year)->get();
    }

    //Método que uso para mostrar los cursos del profesor
    public function byCoursesTeacher($code)
    {
      return DB::table('detailTeachers as dt')
            ->join('workers as w', 'w.codeWorker', '=', 'dt.codeWorker')
            ->join('courses as c', 'c.idCourse', '=', 'dt.idCourse')
            ->join('sections as s', 's.idSection', '=', 'dt.idSection')
            ->join('periodsYear as p', 'p.idPeriod', '=', 'dt.idPeriod')
            ->join('grades as g', 'g.idGrade', '=', 's.idGrade')
            ->select('dt.codeWorker','dt.codeTeacher','w.nameWorker','w.lastNameWorker',
                     'c.descriptionCourse','g.descriptionGrade', 's.descriptionSection',
                     'p.bimester', 'p.yearPeriod')
            ->where('dt.codeTeacher', $code)->get();
    }
}
