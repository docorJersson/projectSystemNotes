<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $primaryKey='codeStudent';
    protected $fillable=['nameStudent','lastNameStudent','dniStudent','codeWorker','idLevel','idDegree','idSection','idPeriod'];
    public $timestamps=false;
}
