<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table='periods';
    protected $primaryKey='idPeriod';
    protected $fillable=['yearPeriod','bimester'];
    public $timestamps=false;
}
