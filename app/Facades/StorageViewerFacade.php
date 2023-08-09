<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class StorageViewerFacade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'storage-viewer';
    }
}