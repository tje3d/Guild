<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = [];

    /**
     * Class relation
     * @return \App\Klass
     */
    public function klass()
    {
    	return $this->belongsTo('App\Klass');
    }

    /**
     * Race relation
     * @return \App\Race
     */
    public function race()
    {
    	return $this->belongsTo('App\Race');
    }

    /**
     * Questions relation
     * @return \App\Answers
     */
    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    /**
     * Class icon url
     * @return string
     */
    public function klassIcon()
    {
    	return $this->klass->image;
    }

    /**
     * Race icon url
     * @return string
     */
    public function raceIcon()
    {
    	return sprintf($this->race->image, $this->gender);
    }

    /**
     * Scope not checked
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotChecked($query)
    {
    	return $query->whereNull('status');
    }

    /**
     * Character Status Informations
     * @return App\CharacterStatus
     */
    public function getStatus()
    {
    	return new CharacterStatus($this);
    }
}
