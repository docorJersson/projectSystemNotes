<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'workers';
    protected $primaryKey = 'codeWorker';
    protected $keyType = 'string';
    protected $fillable = ['nameWorker', 'lastNameWorker', 'dniWorker', 'addressWorker', 'civilStatus', 'telephone', 'socialSecurity', 'dateWorker', 'statusWorker'];
    public $timestamps = false;
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'codeWorker');
    }
    public function administrator()
    {
        return $this->hasOne(administrator::class);
    }
}
