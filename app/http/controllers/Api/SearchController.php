<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Place;
use App\Transformers\SearchTransformer as SearchTransformer;
use Validator;

class SearchController extends ApiController
{

    private $searchTransformer;

    /**
     * @param SearchTransformer $searchTransformer
     */
    public function __construct(SearchTransformer $searchTransformer)
    {
        $this->searchTransformer = $searchTransformer;
    }

    public function searchPlace(Request $request)
    {
        $state =  $request->header('name');
        $type =  $request->header('type');
        $gender =  $request->header('gender');
        $check_in =  $request->header('checkin');
        $check_out =  $request->header('checkout');

        $input = array(
            'name' => $state, 'gender' => $gender, 'checkin' => $check_in,
            'checkout' => $check_out, 'type' => $type
        );

        $validator = Validator::make($input, Place::rules());

        if ($validator->fails()) {
            return $this->setStatusCode(422)->respondWithError($validator->errors());
        }

        $stateExists =  $request->header('name') ? true : false;
        $typeExists =  $request->header('type') ? true : false;
        $genderExists =  $request->header('gender') ? true : false;
        $check_inExists =  $request->header('checkin') ? true : false;

        $places = Place::with('reviews')
            ->leftjoin('supplier_profile','places.owner_id','=','supplier_profile.user_id')
            ->when($stateExists, function ($query) use ($state) {
                return $query->where('supplier_profile.state','LIKE','%' . $state . '%');
            })->when($genderExists, function ($query) use ($gender) {
                return $query->where('places.gender', $gender);
            })
            ->when($typeExists, function ($query) use ($type) {
                return $query->where('places.type_id', $type);
            })
            ->select(['places.*'])
            //->distinct()
            ->paginate(10);

        return $this->respondWithPagination($places, [
            'data' => $this->searchTransformer->transformCollection($places->all())
        ]);
    }

}