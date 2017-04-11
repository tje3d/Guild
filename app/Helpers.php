<?php

use Illuminate\Routing\UrlGenerator;

function remove_port($input)
{
	return str_replace(":81", "", $input);
}

function route($name, $parameters = [], $absolute = true)
{
    return remove_port(app('url')->route($name, $parameters, $absolute));
}

function url($path = null, $parameters = [], $secure = null)
{
    if (is_null($path)) {
        return app(UrlGenerator::class);
    }

    return remove_port(app(UrlGenerator::class)->to($path, $parameters, $secure));
}
