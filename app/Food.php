<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = ['id'];

    public function setNameAttribute($name)
	{
		$this->attributes['name'] = ucwords($name);
	}
}
