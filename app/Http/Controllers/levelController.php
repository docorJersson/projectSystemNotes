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
    public function byCoursesTeacher($code,$year)
    {
      return DB::table('detailTeachers as dt')
            ->join('workers as w', 'w.codeWorker', '=', 'dt.codeWorker')
            ->join('courses as c', 'c.idCourse', '=', 'dt.idCourse')
            ->join('sections as s', 's.idSection', '=', 'dt.idSection')
            ->join('periodsYear as p', 'p.idPeriod', '=', 'dt.idPeriod')
            ->join('grades as g', 'g.idGrade', '=', 's.idGrade')
            ->select('dt.idDetailTeacher','dt.codeWorker','dt.codeTeacher','w.nameWorker',
                     'w.lastNameWorker', 'c.idCourse','c.descriptionCourse','g.idGrade',
                     'g.descriptionGrade','s.idSection', 's.descriptionSection','p.idPeriod',
                     'p.bimester', 'p.yearPeriod')
            ->where(['dt.codeTeacher' => $code,'p.yearPeriod' => $year])->get();
    }

    //Código que le brutitot de chilon no hizo
      public function blue($id, $idCourse, $idSection, $idPeriod) {
         return DB::table('detailTeachers')->select('idDetailTeacher')
            ->where(['codeWorker' => $id, 'idCourse' => $idCourse, 'idSection' => $idSection, 'idPeriod' => $idPeriod])->get();
   }
}
