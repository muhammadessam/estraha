<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Lang;
use DB;

class SpecialOffersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }



    public function index(Request $request)
    {

        $places = Place::select('places.*')->where('special_offer',1)->get();
        return view('specialoffer.index', compact('places'))->with('i', 0);

    }


    public function create()
    {
        $places = Place::all();

        return view ('specialoffer.create',compact('places'));
    }


    public function show($place_id){

        $places  = Place::find($place_id);
        if($places)
        {
            return view ('specialoffer.show', compact('places'));
        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }
    }


    public function store(Request $request){

        Place::create($request->all());

        flash()->success(Lang::get('messages.addSpecialOfferSuccessfully'));
        return redirect('specialoffers');
    }


    public function edit($place_id)
    {
        $places = Place::find($place_id);
        if($places)
        {
            return view ('specialoffer.edit' , compact('places'));
        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }
    }


    public function update($place_id, Request $request){

        $places = Place::findOrFail($place_id);
        $places->update($request->all());

        flash()->success(Lang::get('messages.updateSpecialOfferSuccessfully'));
        return redirect ('specialoffers');
    }



    public function destroy ($place_id){

        $places = Place::find($place_id);

        if($places)
        {
            DB::table('places')
                ->where('id',  $place_id)
                ->update(array('special_offer' => '0'));
            flash()->success(Lang::get('messages.deleteSpecialOfferSuccessfully'));
            return redirect ('specialoffers');        }
        else
        {
            flash()->success(Lang::get('messages.placenotfound'));
            return redirect()->back();
        }




    }








}