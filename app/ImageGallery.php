<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class ImageGallery extends Model implements HasMedia, HasMediaConversions
{
	use HasMediaTrait;

	protected $guarded = [];
	protected $table   = 'imagegalleries';
	protected $with    = ['media'];

	public function registerMediaConversions()
	{
		$this->addMediaConversion('thumb')
			->width(200)
			->height(200);

		$this->addMediaConversion('site')
			->width(800)
			->height(600);
	}
}
