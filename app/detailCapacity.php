<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class detailCapacity extends Pivot
{
    protected $table = 'detailCapacities';
    protected $primaryKey = 'idDetailCapacity';
    public $incrementing = true;
    public $timestamps = false;

    public function periodYears()
    {
        return $this->belongsTo(Period::class, 'idPeriod');
    }
}
