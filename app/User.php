<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'idUser';
    protected $table = 'users';
    protected $fillable = [
        'nameUser', 'school', 'password', 'idRole'
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // public function role()
    // {
    //     return $this->belongsTo('App\Role');
    // }

    // public function isAdmin(){
    //     if ($this->role->role=='Administrador') {
    //         # code...
    //         return true;
    //     }
    //     return false;
    // }
}
