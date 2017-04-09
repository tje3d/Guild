<?php

namespace App\Warmane\Contracts;

use App\Warmane\Character;

interface WowWebsite
{
	/**
     * Find character in warmane
     * @param  string $name
     * @return Character
     */
	public function character(string $name) : Character;
}