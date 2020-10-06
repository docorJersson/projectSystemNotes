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

    public function  RegisterNotes()
    {
        return view('Maintainer.RegisterNotes');
    }
}
