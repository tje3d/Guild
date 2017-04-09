<?php

namespace App\Warmane;

use App\Warmane\Contracts\WowWebsite;
use Tje3d\DomParser\DomParser;

class Warmane implements WowWebsite
{
    public $characterUrl = 'http://armory.warmane.com/character/%s/Icecrown/profile';

    /**
     * Find character in warmane
     * @param  string $name
     * @return Character
     */
    public function character(string $name) : Character
    {
        $name     = ucfirst($name);
        $url      = sprintf($this->characterUrl, $name);

        $response = (string) (new \GuzzleHttp\Client)->get($url)->getBody();

        return new Character(DomParser::parse($response));
    }
}
