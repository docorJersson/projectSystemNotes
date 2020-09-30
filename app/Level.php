<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    protected $primaryKey = 'idLevel';
    protected $fillable = ['descriptionLevel'];
    public $timestamps = false;

    public function grades()
    {
        return $this->hasMany(Degree::class, 'idGrade');
    }
}
