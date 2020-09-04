<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table='sections';
    protected $primaryKey='idSection';
    protected $fillable=['descriptionSection','idDegree','idLevel'];
    public $timestamps=false;
}
