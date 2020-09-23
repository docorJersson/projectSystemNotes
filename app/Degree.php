<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table='grades';
    protected $primaryKey='idGrade';
    protected $fillable=['descriptionGrade','idLevel'];
    public $timestamps=false;
}
