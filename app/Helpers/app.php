<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    function now($timezone = null)
    {
        return Carbon::now($timezone);
    }
}
