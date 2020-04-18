<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/15/2017
 * Time: 11:57 AM
 */

namespace App\Transformers;


use App\Esteraha\Helpers\PlaceHelper;

class SearchTransformer extends Transformer
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
            'reviews' => number_format($places->reviews()->avg('review'), 1),
            'pictures' => PlaceHelper::preparePlacePicturesData($places['pictures']),
        ];
    }

}