<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['avatar', 'name', 'email', 'username', 'password', 'isAdmin'];
    protected $hidden = ['password', 'remember_token'];

    /*=============== GET/SET ATTRIBUTE ===============*/ 

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /*=============== RELATIONSHIP ===============*/ 

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }    

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
