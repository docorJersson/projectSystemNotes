<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'idCourse';
    protected $fillable = ['codeCourse', 'descriptionCourse', 'idGrade'];
    public $timestamps = false;

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'detailTeachers', 'idCourse', 'codeTeacher')->using(detailTeacher::class);
    }
    public function periodYears()
    {
        return $this->belongsToMany(Period::class, 'detailTeachers', 'idCourse', 'idPeriod')->using(detailTeacher::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'detailTeachers', 'idCourse', 'idSection')->using(detailTeacher::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'idGrade');
    }
}
