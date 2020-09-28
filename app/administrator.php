<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
    protected $table = "administrators";
    protected $primaryKey = "codeAdministrador";
    protected $typeKey = "string";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function worker()
    {
        return $this->morphOne(Worker::class, 'teamWork');
    }
}
