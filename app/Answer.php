<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    /**
     * Get all of the owning questionable models
     */
    public function question()
    {
    	return $this->morphTo();
    }
}
