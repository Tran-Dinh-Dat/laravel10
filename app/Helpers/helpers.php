<?php
use App\Facades\StorageViewerFacade;

if (! function_exists('get_image')) {
    function get_image($path)
    {
        return app('url')->route('get-image', ['file' => $path]);
    }
}

if (! function_exists('get_image_facade')) {
    function get_image_facade($path)
    {
        return StorageViewerFacade::getImage($path);
    }
}