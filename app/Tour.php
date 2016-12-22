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

	public function toInsert($request)
	{
		return auth()->user()->tours()->create($request->all());
	}

	public function toUpdate($request, $tour)
	{
		array_add($request, 'user_id', auth()->user()->id);

		return $tour->update($request->all());
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
