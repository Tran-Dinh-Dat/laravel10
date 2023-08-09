<?php 

namespace App\Facades;

class StorageViewer
{
    public function getImage(string $path): string
    {
        return app('url')->route('get-image', ['file' => $path]); 
    }
}