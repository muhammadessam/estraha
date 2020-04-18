<?php namespace App\Http\Controllers\Api;

use App\Models\Type;
use App\Transformers\PlaceTransformer as PlaceTransformer;
use App\Models\Place;
use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;

class PlaceController extends ApiController
{

    private $placeTransformer;

    /**
     * @param PlaceTransformer $placeTransformer
     */

    public function __construct(PlaceTransformer $placeTransformer)
    {
        $this->placeTransformer = $placeTransformer;
    }

    public function getPlaces(Request $request, $type = null)
    {
        $lat  = $request->header('lat');
        $lng  = $request->header('lng');

        $input = array(
            'lat' => $lat, 'lng' => $lng, 'type' => $type
        );

        $validator = Validator::make($input, Place::locationRules());

        if ($validator->fails()) {
            return $this->setStatusCode(422)->respondWithError($validator->errors());
        }

        if($type == 'default')
        {
            $places = Place::with('reviews')
                           ->paginate(10);
        }
        elseif($type == 'special_offer')
        {
            $places = Place::with('reviews')
                           ->where('special_offer', 1)
                           ->paginate(10);
        }
        elseif($type == 'location')
        {
            $places = Place::with('reviews')
                              ->distance($lat, $lng)
                              ->having("distance", "<=", 5)
                              ->orderBy("distance")
                              ->get();
            
            $currentPage = $request->get('page');
            $currentPageSearchResults = $places->slice(($currentPage - 1) * 10, 10)->all();

            $places = new LengthAwarePaginator($currentPageSearchResults, count($places), 10);
        }
        else
        {
            $places = Place::with('reviews')->paginate(10);
        }

        return $this->respondWithPagination($places, [
            'data' => $this->placeTransformer->transformCollection($places->all())
       ]);
    }

    public function getPlaceTypes()
    {
        $placeTypes = Type::select('id', 'name')->get();

        return $this->respond([
            'types' => $placeTypes
        ]);
    }



}