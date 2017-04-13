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

		if (date("H") < $time) {
			return self::formatDate($time, time());
		}

		return self::formatDate($time, strtotime("+1 day"));
	}

	/**
	 * Get raidtime from settings
	 */
	public static function raidTime()
	{
		$time = \Setting::get('raidtime', 'Start 16 [4PM] , End 19 [7PM] (GMT)');
		preg_match("/ (\d+) /", explode(',', $time)[0], $match);
		return $match[1];
	}

	/**
	 * Format input date
	 */
	public static function formatDate($input, $time)
	{
		return strtotime(date("Y-m-d {$input[0]}:00:00", $time));
	}
}
