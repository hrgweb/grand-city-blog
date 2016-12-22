<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = [ 'user_id', 'location', 'title', 'avatar', 'description' ];

	/*=============== GET/SET ATTRIBUTE ===============*/ 

	public function setLocationAttribute($location)
	{
		$this->attributes['location'] = ucfirst($location);
	}

	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = ucfirst($title);
	}

	/*=============== CUSTOM METHODS ===============*/ 

	public function toInsert($request)
	{
		return auth()->user()->location()->create($request->all());
	}

	public function toUpdate($request, $location)
	{
		array_add($request, 'user_id', auth()->user()->id);

        return $location->update($request->all());
	}

	/*=============== RELATIONSHIP ===============*/ 

	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
