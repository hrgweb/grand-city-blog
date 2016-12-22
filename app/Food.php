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

	public function toInsert($request)
	{
		return auth()->user()->foods()->create($request->all());
	}

	public function toUpdate($request, $food)
	{
		array_add($request, 'user_id', auth()->user()->id);

		return $food->update($request->all());
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
