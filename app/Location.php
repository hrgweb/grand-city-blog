<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = [ 'location', 'title', 'avatar', 'description' ];

	public function setLocationAttribut($location)
	{
		$this->attributes['location'] = ucfirst($location);
	}

	public function setTitleAttribut($title)
	{
		$this->attributes['title'] = ucfirst($title);
	}

	public function setLocationAttribute($location)
	{
		$this->attributes['location'] = ucwords($location);
	}

	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = ucwords($title);
	}
}
