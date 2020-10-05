<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class detailTeacher extends Pivot
{
    protected $table = 'detailTeachers';
    protected $primaryKey = 'idDetailTeacher';
    // protected $fillable = [
    //     'codeWorker','codeTeacher','idCourse','idSection','idPeriod'
    // ];
    public $incrementing = true;
    public $timestamps = false;

    public function periodYears()
    {
        return $this->belongsTo(Period::class, 'idPeriod');
    }
    public function sections()
    {
        return $this->hasMany(Section::class, 'idSection');
    }
}
