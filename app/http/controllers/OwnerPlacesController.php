<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\File;
use Illuminate\Support\Facades\Input;
use App\Models\Place;
use App\Models\Picture;
use App\Models\Type;
use App\Models\User;
use App\Models\Role;
use App\Models\Amenity;
use App\Models\PlaceAmenities;
use App\Http\Requests\PlaceRequest;
use App\Notifications\AddPlace;
use Auth;
use Lang;
use Image;
use DB;
use Mapper;
use FCM;
use  Geocoder\Laravel\Facades\Geocoder;


class OwnerPlacesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:supplier');
    }

    public function index()
    {
        $places = Place::select('*')->where('owner_id', Auth::id())
            ->get();

        return view('ownerplaces.index', compact('places'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $places = Place::all();
        $types = Type::all();
        $amenities = Amenity::all();
        return view ('ownerplaces.create',compact('places','types','users','amenities'));
    }

    public function show($place_id){

        $places  = Place::find($place_id);
        if($places)
        {
            return view ('ownerplaces.show', compact('places'));
        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }

    }

    /**
     * @param PlaceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PlaceRequest $request){

        dd($request->all());

        $request->request->add(['owner_id' => Auth::id()]);

        $places= Place::create($request->all());

        $id =$places->id;


        if(Input::hasFile('picture') && $request->file('picture')->isValid()){
            $extension = $request->picture->extension();

            $image = Input::file('picture');
            $name = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);
            $filename  =  $name. '_' .$id. '.' .$extension;
            $path = public_path('images/Places/' .$filename);

            Image::make($image->getRealPath())->save($path);
            $picture = new Picture();
            $picture->place_id= $id;
            $picture->name=$filename;
            $picture->save();
        }



        $amenities = $request->get('amenity_id');
        foreach ($amenities as $key=>$amenity) {
            DB::table("place_amenities")->insert([
                "place_id" => $id,
                "amenity_id" => $amenity,
            ]);

        }


        flash()->success(Lang::get('messages.addPlaceSuccessfully'));
        return redirect('ownerplaces');
    }


    public function edit($place_id)
    {



        $places = Place::find($place_id);

        $lat = $places->lat;
        $lng = $places->lng;
        $types = Type::all();

        $amenities = Amenity::all();
        $role_id = Role::select('id')->where('code','=','supplier')->first();
        $id = $role_id->id;
        $users = User::select('*')->where('role_id',$id)->get();

        $typename = Place::join('types', 'types.id', '=', 'places.type_id')
            ->select('types.name')
            ->where('places.id',$place_id)
            ->first();

        $tname = $typename->name;

        $username = Place::join('users', 'users.id', '=', 'places.owner_id')
            ->select('users.name')
            ->where('places.id',$place_id)
            ->first();
        $username = $username->name;


        $place_amenity = PlaceAmenities::join('amenities', 'amenities.id', '=', 'place_amenities.amenity_id')
            ->select('amenity_id','amenities.name')->where('place_id',$place_id)->get();

        $place_amenity_not = Amenity::
        select('amenities.id','amenities.name')->
        whereNotIn('amenities.id', $place_amenity)
            -> whereNotIn('amenities.name', $place_amenity)
            ->get();

        if($places)
        {
            return view ('ownerplaces.pictureform' , compact('places','types','amenities','users','tname','username',
                'place_amenity','place_amenity_not','lat','lng'));
        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }
    }


    public function update($place_id, Request $request){


        $places = Place::find($place_id);
        $places->update($request->all());


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


        $amenities = $request->get('amenity_id');

        if($amenities != null) {
            foreach ($amenities as $key => $amenity) {
                DB::table('place_amenities')
                    ->where('id', $place_id)
                    ->update(array('amenity_id' => $amenity));
            }
        }

        flash()->success(Lang::get('messages.updatePlaceSuccessfully'));
        return redirect ('ownerplaces');
    }



    public function destroy ($place_id){

        $places = Place::find($place_id);

        if($places)
        {
            $places->delete();

            flash()->success(Lang::get('messages.deletePlaceSuccessfully'));
            return redirect ('ownerplaces');        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }



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
        return redirect ('ownerplaces');
    }
}