<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teachers';
    protected $primaryKey='codeTeacher';
    protected $fillable=['codeWorker','idCourse','idDegree','idSection','idLevel','idPeriod'];
    public $timestamps=false;
}