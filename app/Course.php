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
        return $this->belongsToMany(Teacher::class, 'detailTeachers', 'idCourse', 'codeTeacher')->using(detailTeacher::class)->withPivot('idDetailTeacher');
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'idGrade');
    }
    public function capacities()
    {
        return $this->belongsToMany(Capacity::class, 'detailCapacities', 'idCourse', 'idCapacity')->using(detailCapacity::class)->withPivot('orderCapacity');
    }
}
