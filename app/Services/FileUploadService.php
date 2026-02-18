<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
   
    public function uploadFile(Request $request, string $fileName, string $destiationFolder): ?string
    {
        if (!$request->hasFile($fileName)) {
            return null;
        }
        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $imageNewName= now()->timestamp.uniqid('', true) . '.' . $extension;
       Storage::disk('public')->put($destiationFolder.'/'.$imageNewName ,  file_get_contents($file));
        return $imageNewName;
    }
}
