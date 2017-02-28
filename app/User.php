<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo('App\Roles');
    }

    public function roleHQ(){
        if($this->roles_id == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function roleFranchisee(){
        if($this->roles_id == 2 || $this->roles_id == 1){
            return true;
        }
        else{
            return false;
        }
    }
}
