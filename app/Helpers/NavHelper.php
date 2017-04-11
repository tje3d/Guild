<?php

namespace App\Helpers;

use \Route;

class NavHelper
{
    public static function regex($name, $match = '', $notmatch = '')
    {
        $where  = Route::currentRouteName();
        $result = preg_match("/" . $name . "/", $where) ? true : false;
        return $result ? $match : $notmatch;
    }

    public static function is($route, $match = '', $notmatch = '')
    {
        return Route::currentRouteName() == $route ? $match : $notmatch;
    }
}
