<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';
    protected $primaryKey='idCourse';
    protected $fillable=['codeCourse','descriptionCourse','idLevel','idDegree'];
    public $timestamps=false;
}
