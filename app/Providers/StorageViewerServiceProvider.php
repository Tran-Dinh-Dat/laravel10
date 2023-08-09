<?php

namespace App\Providers;

use App\Facades\StorageViewer;
use Illuminate\Support\ServiceProvider;

class StorageViewerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('storage-viewer',function(){
            return new StorageViewer();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
