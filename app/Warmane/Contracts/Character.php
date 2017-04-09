<?php

namespace App\Warmane\Contracts;

use Tje3d\DomParser\Dom;

interface Character
{
	public function __construct(Dom $data);
	public function realm();
	public function race();
	public function klass();
	public function level();
	public function guild();
	public function faction();
	public function gender();
}