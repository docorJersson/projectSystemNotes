<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table='notes';
    protected $primaryKey='idNotes';
    protected $fillable=['codeStudent','codeWorker','idLevel','idDegree','idSection','idCourse','idCapacity','note1','note2','note3','average','idperiod'];
    public $timestamps=false;
}
