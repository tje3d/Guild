<?php

namespace App\Warmane;

use App\Warmane\Contracts\Character as BaseCharacter;
use Tje3d\DomParser\Dom;

class Character implements BaseCharacter
{
    private $data;

    public function __construct(Dom $data)
    {
        $this->data = $data;
    }

    /**
     * Realm name
     * @return string|null
     */
    public function realm()
    {
        $target = $this->data->find('.level-race-class', 0);

        if (!$target) {
            return null;
        }

        list($other, $realm) = explode(", ", $target->innerText());
        return ucfirst(trim(strtolower($realm)));
    }

    /**
     * Race name
     * @return string|null
     */
    public function race()
    {
        $races  = \App\Race::get()->pluck('name');
        $target = $this->data->find('.level-race-class', 0);

        if (!$target) {
            return null;
        }

        list($other, $realm) = explode(", ", $target->innerText());
        foreach ($races as $race) {
            if (preg_match("/$race/i", $other)) {
                return $race;
            }
        }

        return null;
    }

    /**
     * Class name
     * @return string|null
     */
    public function klass()
    {
        $klasses = \App\Klass::get()->pluck('name');
        $target  = $this->data->find('.level-race-class', 0);

        if (!$target) {
            return null;
        }

        list($other, $realm) = explode(", ", $target->innerText());
        foreach ($klasses as $klass) {
            if (preg_match("/$klass/i", $other)) {
                return $klass;
            }
        }

        return null;
    }

    /**
     * Level
     * @return int|null
     */
    public function level()
    {
    	$target = $this->data->find('.level-race-class', 0);

        if (!$target) {
            return null;
        }

        list($other, $realm) = explode(", ", $target->innerText());
        preg_match("/Level (\d+)/", $other, $match);

        if (isset($match[1]) && ctype_digit($match[1])) {
            return $match[1];
        }

        return null;
    }

    /**
     * Guild Name
     * @return string|null
     */
    public function guild()
    {
    	$target = $this->data->find('.guild-name a', 0);

        if (!$target) {
            return null;
        }

        return trim($target->innerText());
    }

    /**
     * Faction
     * @return string
     */
    public function faction()
    {
    	$alliance = ['Human', 'Dwarf', 'Night Elf', 'Gnome', 'Draenei'];
        return in_array($this->race(), $alliance) ? 'Alliance' : 'Horde';
    }

    /**
     * Gender
     * @return string
     */
    public function gender()
    {
    	return preg_match("/female/", $this->data) ? 'Female' : 'Male';
    }
}
