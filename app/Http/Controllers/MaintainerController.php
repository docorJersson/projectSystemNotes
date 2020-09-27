<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintainerController extends Controller
{
    public function GradesSections()
    {
        return view('Maintainer.GradeSeccion');
    }

    public function DefCoursesGrades()
    {
        return view('Maintainer.CoursesxGrades');
    }

    public function Courses()
    {
        return view('Maintainer.MaintainerCourses');
    }

    public function Capacity()
    {
        return view('Maintainer.Capacity');
    }

    public function  Mcatedra()
    {
        return view('Maintainer.MaintainerCatedra');
    }

    public function  RegisterNotes()
    {
        return view('Maintainer.RegisterNotes');
    }
}
