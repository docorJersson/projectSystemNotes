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
use App\Teacher;
use App\Worker;
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
        //dd($dt);
        /*foreach ($dt->sections as $d) {
            print($d);
        }
        die;*/
        // dd($dt->sections);
        $course = Course::findOrFail($dt->idCourse);
        $capacities = $course->capacities()->where('idPeriod', $dt->idPeriod)->orderBy('orderCapacity')->get();
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
        $dt = detailTeacher::findOrFail($id);
        $course = Course::findOrFail($request->idCourse);
        $newTeacher = Teacher::findOrFail($request->codeWorker);
        $dt->codeTeacher = $newTeacher->codeTeacher;
        $dt->codeWorker = $newTeacher->codeWorker;
        $dt->save();
        $oldCapacities = $course->capacities()->where('idPeriod', $request->idPeriod)->get();
        $newCapacities = $request->idCapacity;
        $orderNewCapacities = $request->orderCapacity;
        foreach ($newCapacities as $keyNew => $newCapacity) {
            foreach ($oldCapacities as $keyOld => $oldCapacity) {
                if ($oldCapacity->idCapacity == $newCapacity) {
                    unset($oldCapacities[$keyOld]);
                    unset($newCapacities[$keyNew]);
                    unset($orderNewCapacities[$keyNew]);
                }
            }
        }
        if (!empty($oldCapacities)) {
            foreach ($oldCapacities as $c) {
                detailCapacity::destroy($c->pivot->idDetailCapacity);
            }
        }
        $newCapacities = array_values($newCapacities);
        $orderNewCapacities = array_values($orderNewCapacities);
        if (!empty($newCapacities)) {
            $tamaño = count($newCapacities);
            for ($i = 0; $i < $tamaño; $i++) {
                $course->capacities()->attach($newCapacities[$i], ['idPeriod' => $request->idPeriod, 'orderCapacity' => $orderNewCapacities[$i]]);
            }
        }
        return redirect('courses');
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
