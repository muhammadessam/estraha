<?php namespace App\Transformers;

class PlaceAmenitiesTransformer extends Transformer
{

    public function transform($amenity)
    {
        return [
            'amenity' => $amenity,
        ];
    }

}