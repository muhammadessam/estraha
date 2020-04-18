<?php namespace App\Http\Controllers\Api;

use App\Models\Booking;
use App\Transformers\PlaceTransformer;
use Carbon\Carbon;
use App\Models\Place;
use App\Http\Requests\BookingRequest;

use DB;
use Lang;

class BookingController extends ApiController
{

    /**
     * @var PlaceTransformer
     */
    private $placeTransformer;

    /**
     * @param PlaceTransformer $placeTransformer
     */

    public function __construct(PlaceTransformer $placeTransformer)
    {
        $this->placeTransformer = $placeTransformer;
    }

    public function bookPlace(BookingRequest $request, $place_id)
    {
         $place = Place::select('id')->where('id', $place_id)->first();

         if(!$place)
         {
             return $this->respondNotFound(Lang::get('messages.placeNotFound'));
         }
         else
         {
             $client_id = auth()->user()->getAuthIdentifier();
             $name = $request->name;
             $email = $request->email;
             $city = $request->city;
             $phone_number = $request->phone_number;
             $price = $request->price;
             $check_in = $request->check_in;
             $check_out = $request->check_out;
             $payment_method = $request->payment_method;

             $check_in = Carbon::createFromFormat('d-m-Y', $check_in)->toDateString();
             $check_out = Carbon::createFromFormat('d-m-Y', $check_out)->toDateString();

             $reservation = Booking::select('check_in', 'check_out')->
             where('place_id', $place_id)->interval($check_in, $check_out)->first();

             if($reservation)
             {
                 return $this->setStatusCode(400)->respondWithError(Lang::get('messages.placeReserved'));
             }
             else
             {
                 $owner = Place::join('users', 'users.id', '=', 'places.owner_id')
                     ->where('places.id', $place_id)
                     ->select(['users.id'])
                     ->first();

                 $owner_id = $owner->id;

                 $booking = new Booking();
                 $booking->name = $name;
                 $booking->email = $email;
                 $booking->city = $city;
                 $booking->phone_number = $phone_number;
                 $booking->price = $price;
                 $booking->check_in = $check_in;
                 $booking->check_out = $check_out;
                 $booking->payment_method = $payment_method;
                 $booking->owner_id = $owner_id;
                 $booking->client_id = $client_id;
                 $booking->place_id = $place_id;
                 $booking->save();

                 return $this->respond([
                     'message' => Lang::get('messages.bookingSuccessfully'),
                     'booking_id' => $booking->id
                 ]);
             }
         }
    }

    public function getTopBooking()
    {
       $places = Place::join('bookings', 'bookings.place_id', '=', 'places.id')
                           ->select(DB::raw('COUNT(bookings.place_id) AS total'), 'places.id', 'places.place_name','places.price',
                               'places.description','places.address','places.gender', 'places.special_offer','places.price_offer',
                               'places.lat','places.lng')
                           ->groupBy('places.id', 'places.place_name','places.price','places.description','places.address','places.gender',
                              'places.special_offer','places.price_offer')
                           ->orderBy('total', 'DESC')
                           ->paginate(10);

       return $this->respondWithPagination($places, [
           'data' => $this->placeTransformer->transformCollection($places->all())
       ]);
    }

}