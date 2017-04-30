<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Staff extends Model implements HasMedia, HasMediaConversions
{
	use HasMediaTrait;

	protected $guarded = [];
	protected $table   = 'staffs';
	protected $with    = ['media'];

	public function registerMediaConversions()
	{
		$this->addMediaConversion('thumb')
			->width(150)
			->height(150);
	}
}
