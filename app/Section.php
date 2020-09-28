<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $primaryKey = 'idSection';
    protected $fillable = ['descriptionSection', 'idDegree', 'idLevel'];
    public $timestamps = false;

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'detailTeachers', 'idSection', 'codeTeacher')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'detailTeachers', 'idSection', 'idCourse')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }
}
