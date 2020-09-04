<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table='degrees';
    protected $primaryKey='idDegree';
    protected $fillable=['descriptionDegree','idLevel'];
    public $timestamps=false;
}
