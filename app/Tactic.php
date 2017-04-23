<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Tactic extends Model implements HasMedia, HasMediaConversions
{
    use HasMediaTrait;

    protected $guarded = [];
    protected $with    = ['media'];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb_large')
            ->width(800)
            ->height(533);

        $this->addMediaConversion('thumb_small')
            ->width(140)
            ->height(100);
    }
}
