<?php

namespace App\Helpers;

class Countdown
{
	/**
	 * Get next raid time
	 */
	public static function nextRaid()
	{
		$time = self::raidTime();

		if (date("H:i") < $time) {
			return self::formatDate($time, time());
		}

		return self::formatDate($time, strtotime("+1 day"));
	}

	/**
	 * Get raidtime from settings
	 */
	public static function raidTime()
	{
		$time = \Setting::get('raidtime', 'Start 11:32, End: 15:30');
		$time = preg_replace("/[^0-9\:]/", '', explode(',', $time)[0]);
		return $time;
	}

	/**
	 * Format input date
	 */
	public static function formatDate($input, $time)
	{
		$input = explode(":", $input);
		return strtotime(date("Y-m-d {$input[0]}:{$input[1]}:00", $time));
	}
}
