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
        'name', 'email', 'password','role_id','is_active','photo_id' //204 role_id
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');

    }

    public function photo(){ //205
        return $this->belongsTo('App\Photo');
        //205 a potem php atrisan migrate
    }

    public function setPasswordAttribute($password){ //216
        if(!empty($password)){
            $this -> attributes['password'] = bcrypt($password);
        }
    }

    public function isAdmin(){
        if($this->role->name == "administrator" && $this->is_active == 1){ //220
            return true;
        }
        return false;
    }
    public function posts(){ //224 tworzymy relacje z postami
        return $this->hasMany('App\Post'); //224 i ide do Post.php i tam daje funkcję user

    }
}
