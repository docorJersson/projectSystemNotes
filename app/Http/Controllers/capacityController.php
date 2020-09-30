<?php

namespace App\Http\Controllers;

use App\Capacity;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class capacityController extends Controller
{
    public function index($course)
    {
        $capacity = DB::table('detailCapacities as d')->join('capacities as c', 'd.idCapacity', '=', 'c.idCapacity')->join('courses as co', 'd.idCourse', '=', 'co.idCourse')->join('grades as g', 'co.idGrade', '=', 'g.idGrade')->join('levels as l ', 'l.idLevel', '=', 'g.idLevel')->select('c.*', 'd.orderCapacity')->where('l.idLevel', $course)->get();
        return $capacity->toJson();
    }
}
