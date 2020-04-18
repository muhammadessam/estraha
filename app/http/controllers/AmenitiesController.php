<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;
use Image;
use Intervention\Image\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Place;
use App\Http\Requests\AddAmenityRequest;
use Lang;
use DB;

class AmenitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    public function index()
    {
        $amenities = Amenity::all();
        return view('amenity.index', compact('amenities'));
    }


    public function create()
    {
        $amenities = Amenity::all();
        $places = Place::all();
        return view ('amenity.create',compact('amenities','places'));
    }


    public function show($amenity_id){

        $amenities  = User::find($amenity_id);
        if($amenities)
        {
            return view ('amenity.show', compact('amenities'));
        }
        else
        {
            flash()->success(Lang::get('messages.amenitynotfound'));
            return redirect()->back();
        }
    }

    public function store(AddAmenityRequest $request){

       $amenities= Amenity::create($request->all());

        $id =$amenities->id;

        if(Input::hasFile('picture') && $request->file('picture')->isValid()){

            $extension = $request->picture->extension();

            $image = Input::file('picture');

            $name = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);

            $filename  =  $name. '_' .$id. '.' .$extension;

            $path = public_path('images/Amenities/' .$filename);

            Image::make($image->getRealPath())->save($path);

            DB::table('amenities')
                ->where('id',  $id)
                ->update(array('picture' => $filename));
        }

        flash()->success(Lang::get('messages.addAmenitySuccessfully'));
        return redirect('amenities');
    }


    public function edit($amenity_id)
    {
        $amenities = Amenity::find($amenity_id);
        if($amenities)
        {
            return view ('amenity.pictureform' , compact('amenities'));
        }
        else
        {
            flash()->success(Lang::get('messages.amenitynotfound'));
            return redirect()->back();
        }
    }


    public function update($amenity_id, Request $request){

        $amenities = Amenity::find($amenity_id);
        $amenities->update($request->all());



        if(Input::hasFile('picture') && $request->file('picture')->isValid()){

            $extension = $request->picture->extension();
            $image = Input::file('picture');

            $name = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);

            $filename  =  $name. '_' .$amenity_id. '.' .$extension;

            $path = public_path('images/Amenities/' .$filename);

            Image::make($image->getRealPath())->save($path);

            DB::table('amenities')
                ->where('id',  $amenity_id)
                ->update(array('picture' => $filename));
        }

        flash()->success(Lang::get('messages.updateAmenitySuccessfully'));
        return redirect ('amenities');
    }

    public function destroy ($amenity_id){

        $amenities = Amenity::find($amenity_id);

        if($amenities)
        {
            $amenities->delete();

            flash()->success(Lang::get('messages.deleteAmenitySuccessfully'));
            return redirect ('amenities');
        }
        else
        {
            flash()->success(Lang::get('messages.amenitynotfound'));
            return redirect()->back();
        }

    }



    public function updatePicture($amenity_id, Request $request){

        $amenities = Amenity::find($amenity_id);
        $amenities->update($request->all());


        if(Input::hasFile('picture') && $request->file('picture')->isValid()){

            $extension = $request->picture->extension();
            $image = Input::file('picture');

            $name = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);

            $filename  =  $name. '_' .$amenity_id. '.' .$extension;

            $path = public_path('images/Amenities/' .$filename);

            Image::make($image->getRealPath())->save($path);

            DB::table('amenities')
                ->where('id',  $amenity_id)
                ->update(array('picture' => $filename));


        }


        flash()->success(Lang::get('messages.updateAmenitySuccessfully'));
        return redirect ('amenities');
    }

}