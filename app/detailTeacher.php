<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class detailTeacher extends Pivot
{
    protected $table = 'detailTeachers';
    protected $primaryKey = 'idDetailTeacher';
    public $incrementing = true;

    public function periodYears()
    {
        return $this->belongsTo(Period::class, 'idPeriod');
    }
}
