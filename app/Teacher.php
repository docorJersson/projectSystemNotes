<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'codeTeacher';
    protected $fillable = ['codeWorker', 'idCourse', 'idDegree', 'idSection', 'idLevel', 'idPeriod'];
    public $timestamps = false;

    public function worker()
    {
        return $this->morphOne(Worker::class, 'teamWork');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'detailTeachers', 'codeTeacher', 'idCourse')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'detailTeachers', 'codeTeacher', 'idSection')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }
}
