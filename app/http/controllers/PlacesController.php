<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\File;
use Illuminate\Support\Facades\Input;
use App\Models\Place;
use App\Models\Type;
use App\Models\User;
use App\Models\Role;
use App\Models\Amenity;
use App\Models\PlaceAmenities;
use App\Models\PlacePicture;
use App\Http\Requests\PlaceRequest;
use App\Notifications\AddPlace;
use Auth;
use Lang;
use Image;
use DB;
use Mapper;
use FCM;
use  Geocoder\Laravel\Facades\Geocoder;
use App\Esteraha\Helpers\Uploader;
use App\Models\Picture;
use Mockery\CountValidator\Exception;

class PlacesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin-supplier');

    }

    public function index()
    {

        if(!Auth::user()->hasRole('admin'))
        {
            return redirect()->route('ownerplaces.index');
        }


         $places = Place::select('*')
                        ->orderBy('places.id','desc')
                        ->get();
         return view('place.index', compact('places'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return redirect()->route('places.index');
        }

        $places = Place::all();
        $types = Type::all();
        $amenities = Amenity::all();
        $role_id = Role::select('id')->where('code','=','supplier')->first();
        $id = $role_id->id;
        $users = User::select('*')->where('role_id',$id)->get();
        return view ('place.create',compact('places','types','users','amenities'));
    }

    public function show($place_id){

        $places  = Place::find($place_id);

        if( Auth::user()->hasRole('admin') || $places->owner_id == Auth::user()->id )
        {
            if($places)
            {
                return view ('place.show', compact('places'));
            }

                flash()->success(Lang::get('messages.placenotfound'));
                return redirect()->back();

        }

        return redirect()->route('places.index');
    }

    public function store(Request $request){

        if(Auth::user()->hasRole('admin'))
        {
            return redirect()->route('places.index');
        }

        $validator = Validator::make($request->all(),   [
            'place_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'sleep_room' => 'required',
            'price_offer' => 'required_with:special_offer',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json(['errors' => $errors],200);
        }

          $data = $request->all();

          $data['owner_id'] = Auth::user()->id;
          $data['updated_at'] = Carbon::now()->toDateTimeString();
          $data['created_at'] = Carbon::now()->toDateTimeString();

        if ($data['sleep_room'] == 'yes')
        {
            $data['sleep_room'] = 1;
            $bedsType = collect($data['type_bed']);
            $data['double_rooms_count'] = $bedsType->filter(function($item){ return $item =='two';})->count();
            $data['single_rooms_count'] = $bedsType->filter(function($item){return $item == 'one';})->count();

        }
        else
        {
            $data['sleep_room'] = 0;
            unset($data['type_bed']);
        }



        $places= Place::create($data);
        $id =$places->id;

        if ($request->file('places_images') != null)
        {
            $imageNames = Uploader::upload($request->file('places_images'),public_path().'/images/Places');
            if ($imageNames != null)
            {
                $picsData = collect($imageNames)->transform(function($imageName) use ($places){
                    return ['place_id' => $places->id , 'name' => $imageName];
                })->toArray();

                Picture::insert($picsData);
            }
        }

        $amenities = $request->get('amenity_id');
        if ($amenities != null) {
            foreach ($amenities as $key => $amenity) {

                DB::table("place_amenities")->insert([
                    "place_id" => $id,
                    "amenity_id" => $amenity,
                ]);

            }
        }

        flash()->success(Lang::get('messages.addPlaceSuccessfully'));
        return response()->json(['success' => route('places.index')]);
    }


    public function edit($place_id)
    {
        $places = Place::find($place_id);

        if (Auth::user()->hasRole('admin') || $places->owner_id == Auth::user()->id)
        {
        $lat = $places->lat;
        $lng = $places->lng;
        $types = Type::all();

        $amenities = Amenity::all();
        $role_id = Role::select('id')->where('code', '=', 'supplier')->first();
        $id = $role_id->id;
        $users = User::select('*')->where('role_id', $id)->get();

        $typename = Place::join('types', 'types.id', '=', 'places.type_id')
            ->select('types.name')
            ->where('places.id', $place_id)
            ->first();

        $tname = $typename->name;

        $username = Place::join('users', 'users.id', '=', 'places.owner_id')
            ->select('users.name')
            ->where('places.id', $place_id)
            ->first();
        $username = $username->name;


        $place_amenity = PlaceAmenities::join('amenities', 'amenities.id', '=', 'place_amenities.amenity_id')
            ->select('amenity_id', 'amenities.name')->where('place_id', $place_id)->get();

        $place_amenity_not = Amenity::
        select('amenities.id', 'amenities.name')->
        whereNotIn('amenities.id', $place_amenity)
            ->whereNotIn('amenities.name', $place_amenity)
            ->get();

        $place_pictures = Place::join('place_pictures', 'place_pictures.place_id', '=', 'places.id')
            ->select('place_pictures.name', 'places.id')
            ->where('place_pictures.place_id', $place_id)
            ->get();

        // dd($place_pictures);
        if ($places) {
            return view('place.pictureform', compact('places', 'types', 'amenities', 'users', 'tname', 'username',
                'place_amenity', 'place_amenity_not', 'lat', 'lng', 'place_pictures'));
        } else {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }
    }
        return redirect()->route('places.index');
    }



    public function update($place_id, Request $request){


        $validator = Validator::make($request->all(),   [
            'place_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'sleep_room' => 'required',
            'price_offer' => 'required_with:special_offer',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json(['errors' => $errors],200);
        }

        $places = Place::find($place_id);

        if (Auth::user()->hasRole('admin') || $places->owner_id == Auth::user()->id) {
            $data = $request->all();

            $data['updated_at'] = Carbon::now()->toDateTimeString();

            if ($data['sleep_room'] == 'yes') {
                $data['sleep_room'] = 1;
                $bedsType = collect($data['type_bed']);
                $data['double_rooms_count'] = $bedsType->filter(function ($item) {
                    return $item == 'two';
                })->count();
                $data['single_rooms_count'] = $bedsType->filter(function ($item) {
                    return $item == 'one';
                })->count();

            } else {
                $data['sleep_room'] = 0;
                unset($data['type_bed']);
                $data['double_rooms_count'] = 0;
                $data['single_rooms_count'] = 0;
            }

            $places->update($data);

            $amenities = $request->get('amenity_id');

            if ($amenities != null) {
                DB::table('place_amenities')->where('place_id', $place_id)->delete();

                foreach ($amenities as $key => $amenity) {

                    DB::table("place_amenities")->insert([
                        "place_id" => $place_id,
                        "amenity_id" => $amenity,
                    ]);

                }
            }

            if ($request->file('places_images') != null) {
                $imageNames = Uploader::upload($request->file('places_images'), public_path() . '/images/Places');
                if ($imageNames != null) {
                    $picsData = collect($imageNames)->transform(function ($imageName) use ($places) {
                        return ['place_id' => $places->id, 'name' => $imageName];
                    })->toArray();

                    Picture::insert($picsData);
                }
            }

            flash()->success(Lang::get('messages.updatePlaceSuccessfully'));
            return response()->json(['success' => route('places.index')]);
        }

        return redirect()->route('places.index');
    }



    public function destroy ($place_id){

        $places = Place::find($place_id);

        if (Auth::user()->hasRole('admin') || $places->owner_id == Auth::user()->id) {
            if ($places) {
                $places->delete();

                flash()->success(Lang::get('messages.deletePlaceSuccessfully'));
                return redirect('places');
            }
                flash()->success(Lang::get('messages.placenotfound'));
                return redirect()->back();
        }

        return redirect()->route('places.index');
    }


    public function updatePicture($place_id, Request $request){

        $amenities = Amenity::find($place_id);
        $amenities->update($request->all());


        if(Input::hasFile('picture') && $request->file('picture')->isValid()){

            $extension = $request->picture->extension();
            $image = Input::file('picture');

            $name = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);

            $filename  =  $name. '_' .$place_id. '.' .$extension;

            $path = public_path('images/Places/' .$filename);

            Image::make($image->getRealPath())->save($path);

            DB::table('places')
                ->where('id',  $place_id)
                ->update(array('picture' => $filename));


        }
        flash()->success(Lang::get('messages.updatePlaceSuccessfully'));
        return redirect ('places');
    }

    public function deletePlaceImage(Request $request)
    {
        $imageName = $request->input('image');

        PlacePicture::where('place_id',$request->input('place_id'))
                    ->where('name',$request->input('image'))
                    ->first()
                    ->delete();

        //remove picture from file system if no other place uses it
        if (PlacePicture::where('name',$imageName)->first() == null)
        {
             $imagePath = public_path() . '/images/Places/' . $imageName;

            if (!file_exists($imagePath)) {
                return response()->json(['errors' => 'الصوره لم تعد متاحه بعد الان']);
            }

            unlink($imagePath);
        }
        return response()->json(['success' => 'لقد تم إزاله الصوره بنجاح' ]);

    }

    public function updatePriceOffer(Request $request,$placeId)
    {

        $validator = Validator::make($request->all(),   [
            'price_offer' => 'required_with:special_offer|numeric',
        ],[
            'price_offer.required_with' => Lang::get('messages.placesPriceOfferRequiredWith'),
            'price_offer.numeric' => Lang::get('messages.placesPriceOfferNumber')
        ]);

        if ($validator->fails())
        {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json(['errors' => $errors],200);
        }
        $price_offer = $request->input('special_offer') ? $request->input('price_offer') : null;

        Place::findOrFail($placeId)->update([
            'special_offer' => $request->input('special_offer') ? 1 : 0,
            'price_offer' => $price_offer
        ]);

          flash()->success(Lang::get('messages.placesPriceOffer'));
        return redirect()->route('places.edit',$placeId);
    }
}
