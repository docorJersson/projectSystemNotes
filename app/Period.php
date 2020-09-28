<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periodsYear';
    protected $primaryKey = 'idPeriod';
    protected $fillable = ['yearPeriod', 'bimester'];
    public $timestamps = false;

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'detailTeachers', 'idPeriod', 'codeTeacher')->using(detailTeacher::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'detailTeachers', 'idPeriod', 'idCourse')->using(detailTeacher::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'detailTeachers', 'idPeriod', 'idSection')->using(detailTeacher::class);
    }
}
