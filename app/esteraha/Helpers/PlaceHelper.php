<?php namespace App\Esteraha\Helpers;

class PlaceHelper
{

    public static function preparePlacePicturesData($pictures = array())
    {
        $result = array();
        foreach($pictures as $picture)
        {
            array_push($result, [
                'picture' => $picture['name'],
            ]);
        }

        return $result;
    }

}