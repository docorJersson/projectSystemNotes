<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'codeTeacher';
    protected $keyType = 'string';
    protected $fillable = ['codeWorker', 'idCourse', 'idDegree', 'idSection', 'idLevel', 'idPeriod'];
    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'detailTeachers', 'codeTeacher', 'idCourse')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'codeWorker');
    }
}
