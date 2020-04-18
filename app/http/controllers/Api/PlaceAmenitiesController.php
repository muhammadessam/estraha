<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/15/2017
 * Time: 12:04 PM
 */

namespace App\Http\Controllers\Api;
use App\Transformers\PlaceAmenitiesTransformer as PlaceAmenitiesTransformer;
use App\Models\Place;

class PlaceAmenitiesController extends ApiController
{

    private $placeAmenitiesTransformer;

    /**
     * @param PlaceAmenitiesTransformer $placeAmenitiesTransformer
     */
    public function __construct(PlaceAmenitiesTransformer $placeAmenitiesTransformer)
    {
        $this->placeAmenitiesTransformer = $placeAmenitiesTransformer;
    }

    public function getPlaceAmenities($place_id)
    {
            $amenities = Place::with('amenities')
            ->where('id', $place_id)
            ->paginate(5);

            return $this->respondWithPagination($amenities, [
                'data' => $this->placeAmenitiesTransformer->transformCollection($amenities->all())
            ]);
    }

}