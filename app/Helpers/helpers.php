<?php

if (! function_exists('get_image')) {
    function get_image($path)
    {
        return app('url')->route('get-image', ['file' => $path]);
    }
}
