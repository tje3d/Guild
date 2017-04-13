<?php

namespace App\Warmane\Contracts;

use Tje3d\DomParser\Dom;

interface Character
{
	public function __construct(Dom $data);

	/**
	 * Character found?
	 * @return bool
	 */
	public function exists();

	/**
	 * Realm Name
	 * @return string|null
	 */
	public function realm();

	/**
	 * Race name
	 * @return string|null
	 */
	public function race();

	/**
	 * Class name
	 * @return string|null
	 */
	public function klass();

	/**
	 * Level
	 * @return int|null
	 */
	public function level();

	/**
	 * Guild
	 * @return string|null
	 */
	public function guild();

	/**
	 * Faction
	 * @return string|null
	 */
	public function faction();

	/**
	 * Gender
	 * @return string|null
	 */
	public function gender();
}