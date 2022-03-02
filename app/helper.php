<?php

use App\Models\User;

if (!function_exists('uploadFile')) {
    function uploadFile($file, $dir)
    {
        if ($file) {
            // dd($file);
            $destinationPath =  storage_path('app/public') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;
            $media_image = $file->hashName();
            // dd($media_image);

            $file->move($destinationPath, $media_image);
            return $media_image;
        }
    }
}
