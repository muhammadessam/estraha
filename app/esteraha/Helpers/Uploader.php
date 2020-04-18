<?php

namespace App\Esteraha\Helpers;

class Uploader {

    /**
     * this will upload array of files or a single file to the specified path
     * @param $files
     * @param $path
     * @return array|string
     */
    public static function upload($files,$path)
    {
        $filesNames = [];

        if (is_array($files))
        {
            foreach ($files as $file)
            {
                $filesNames [] = self::uploadSingleFile($file,$path);
            }

            return $filesNames;
        }

        return self::uploadSingleFile($files,$path);
    }


    private static function uploadSingleFile($file,$path)
    {
        $extension = $file->getClientOriginalExtension();

        $fileName = str_random(10).'.'.$extension;

        $file->move($path,$fileName);

        return $fileName;
    }
}