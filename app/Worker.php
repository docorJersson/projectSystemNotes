<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table='workers';
    protected $primaryKey='codeWorker';
    protected $fillable=['nameWorker','lastNameWorker','dniWorker','addressWorker','civilStatus','telephone','socialSecurity','flatWorker','dateWorker','statusWorker'];
    public $timestamps=false;
}
