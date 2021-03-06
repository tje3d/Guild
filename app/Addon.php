<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Addon extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $guarded = [];
	protected $table   = 'addons';
	protected $with    = ['media'];
}
