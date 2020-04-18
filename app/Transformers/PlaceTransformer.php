<?php namespace App\Transformers;

use App\Esteraha\Helpers\PlaceHelper;

class PlaceTransformer extends Transformer
{
    public function transform($places)
    {
        return [
            'id' => $places['id'],
            'name' => $places['place_name'],
            'price'   => $places['price'],
            'description' => $places['description'],
            'latitude' => $places['lat'],
            'longitude' => $places['lng'],
            'address' => $places['address'],
            'gender' => $places['gender'],
            'special_offer' => $places['special_offer'],
            'price_offer' => $places['price_offer'],
            'checkin_start' => $places['checkin_start'],
            'checkin_end' => $places['checkin_end'],
            'stars' => $places['stars'],
            'inner_room' => $places['inner_room'],
            'double_rooms_count' => $places['double_rooms_count'],
            'single_rooms_count' => $places['single_rooms_count'],
            'sleep_room' => $places['sleep_room'],
            'reviews' => number_format($places->reviews()->avg('review'), 1),
            'pictures' => PlaceHelper::preparePlacePicturesData($places['pictures']),
        ];
    }

}