<?php

namespace App\Warmane\Contracts;

use App\Warmane\Character;

interface WowWebsite
{
	public function character(string $name) : Character;
}