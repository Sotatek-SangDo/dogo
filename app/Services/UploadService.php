<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function uploadImg($file)
    {
        if (is_file($file)) {
            $res = [];
            $fileName = str_replace(".", "", microtime(true)) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($fileName, File::get($file));
            return Storage::disk('public')->url($fileName);
        }
    }
}
