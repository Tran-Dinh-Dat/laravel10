<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Upload
{
    public function uploadFile(UploadedFile $file, $folder = null, $disk = 'public', $fileName = null)
    {
        $fileName = ! is_null($fileName) ? $fileName : Str::random(10);
        return $file->storeAs(
            $folder,
            $fileName . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }

    public function deleteFile($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }
}
