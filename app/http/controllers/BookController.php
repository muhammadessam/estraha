<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Lang;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');


    }



    public function index(Request $request)
    {
        $bookings = Booking::join('places', 'places.id', '=', 'bookings.place_id')
            ->join('users', 'users.id', '=', 'bookings.owner_id')
            ->select('places.*','bookings.name As bookname','bookings.email As bookemail','bookings.phone_number As bookphonenumber',
                'bookings.price As bookprice','bookings.city As bookcity', 'places.place_name As placename',
                'bookings.check_in','bookings.check_out','bookings.payment_method','users.name As username'
                ,'bookings.id As bookingid')
            ->get();
        return view('booking.index', compact('bookings'))->with('i', 0);

    }



    public function show($book_id)
    {
        $bookings  = Booking::join('places', 'places.id', '=', 'bookings.place_id')
            ->join('users', 'users.id', '=', 'bookings.owner_id')
            ->join('types', 'types.id', '=', 'places.type_id')
            ->select('places.*','bookings.name As bookname','bookings.email As bookemail','bookings.phone_number As bookphonenumber',
                'bookings.price As bookprice','bookings.city As bookcity', 'places.place_name As placename',
                'bookings.check_in','bookings.check_out','bookings.payment_method','users.name As username',
                'types.name As typename','bookings.id As bookingid')
            ->where('bookings.id',$book_id)
            ->first();
        return view ('booking.show', compact('bookings'));
    }




}