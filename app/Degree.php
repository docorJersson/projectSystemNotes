<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'idGrade';
    protected $fillable = ['descriptionGrade', 'idLevel'];
    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(Level::class, 'idLevel');
    }
    public function courses()
    {
        return $this->hasMany(Course::class, 'idCourse');
    }
}
