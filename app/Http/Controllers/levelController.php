<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;
use App\Section;
use App\Course;

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
}
