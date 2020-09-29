<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    protected $table = 'capacities';
    protected $primaryKey = 'idCapacity';
    protected $fillable = ['idLevel', 'idDegree', 'idLevel', 'idCourse', 'descriptionCapacity', 'abbreviation', 'orderCapacity', 'idPeriod'];
    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'detailCapacities', 'idCapacity', 'idCourse')->using(detailCapacity::class)->withPivot('orderCapacity');
    }
}
