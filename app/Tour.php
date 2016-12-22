<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
	protected $guarded = ['id'];

	public function setPlaceAttribute($place)
	{
		$this->attributes['place'] = ucwords($place);
	}
}
