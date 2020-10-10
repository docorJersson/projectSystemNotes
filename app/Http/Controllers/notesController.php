<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class notesController extends Controller
{
    public function store(Request $request)
    {
        try {
            $detailStudents = $request->idDetailStudent;
            $capacity = $request->idDetailCapacity;
            $detailCapacity = explode(",", $capacity);
            $idPeriod = $request->idPeriodo;
            $notes = $request->notes;
            $registerNotes = null;
            $indiceNotes = 0;
            foreach ($detailStudents as $student) {
                foreach ($detailCapacity as $capacity) {
                    $registerNotes = new Note();
                    $registerNotes->idDetailCapacity = $capacity;
                    $registerNotes->idDetailStudent = $student;
                    $registerNotes->idperiod = $idPeriod;
                    $registerNotes->note = (isset($notes[$indiceNotes])) ? $notes[$indiceNotes] : 0;
                    $registerNotes->save();
                    $indiceNotes++;
                }
            }
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect('register_notes');
    }
}
