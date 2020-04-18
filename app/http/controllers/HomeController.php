<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

use App\Models\Booking;
use App\Models\User;
use App\Models\Place;
use App\Models\Role;
use Lang;
use Hash;
use DB;
use Carbon\Carbon;
use Auth;

use App\Esteraha\Services\SMSService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['testCupas']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Generate a new fullcalendar instance
        $calendar = new \Edofre\Fullcalendar\Fullcalendar();

        $BookedPlaces = $this->getBookedPlaces();
        $calendar->setEvents($BookedPlaces);

        // Set options
        $calendar->setOptions([
            'locale'      => 'ar',
            'weekNumbers' => true,
            'selectable'  => true,
            'defaultView' => 'month',
            // Add the callbacks

//            'eventClick' => new \Edofre\Fullcalendar\JsExpression("
//                function(event, jsEvent, view) {
//                    alert(event);
//                }
//            "),
            'viewRender' =>  new \Edofre\Fullcalendar\JsExpression("
                function( view, element ) {
                    console.log(\"View \"+view.name+\" rendered\");
                }
            "),
        ]);

        return view('dashboard.dashboard', [
            'calendar' => $calendar,
        ]);

    }

    private function getBookedPlaces()
    {
//        $adminrole = Role::select('id')->where('code','=','admin')->first();
//        $admin_role_id = $adminrole->id;
//
//        $supplierrole = Role::select('id')->where('code','=','supplier')->first();
//        $supplier_role_id = $supplierrole->id;




        if (Auth::user()->hasRole('admin')) {
            $bookings = Booking::all();
            foreach ($bookings as $booking) {
                $id = $booking->id;
                $place_id = $booking->place_id;
                $check_in = $booking->check_in;
                $check_out = $booking->check_out;
                $place_name = Place::select('place_name')->where('id', $place_id)->first();
                $placename = $place_name->place_name;

                $checkin = Carbon::parse($check_in)->format('d-m-Y');
                $checkout = Carbon::parse($check_out)->format('d-m-Y');
                $checkinn = Carbon::createFromFormat('d-m-Y', $checkin);

                $checkoutt = Carbon::createFromFormat('d-m-Y', $checkout);


                $BookedPlaces[] = new \Edofre\Fullcalendar\Event([
                    'id' => $id,
                    'title' => $placename,
                    'editable' => true,
                    'startEditable' => true,
                    'durationEditable' => true,
                    'start' => $checkinn,
                    'end' => $checkoutt,
                    'backgroundColor' => '#03a9f3',
                    'borderColor' => '#03a9f3',
                    'textColor' => 'white',
                ]);
                return $BookedPlaces;

            }
        }



        if (Auth::user()->hasRole('supplier')) {
            $bookings = Booking::select('bookings.*')->where('owner_id', Auth::id())->get();
            foreach ($bookings as $booking) {
                $id = $booking->id;
                $place_id = $booking->place_id;
                $check_in = $booking->check_in;
                $check_out = $booking->check_out;
                $place_name = Place::select('place_name')->where('id', $place_id)->first();
                $placename = $place_name->place_name;

                $checkin = Carbon::parse($check_in)->format('d-m-Y');
                $checkout = Carbon::parse($check_out)->format('d-m-Y');
                $checkinn = Carbon::createFromFormat('d-m-Y', $checkin);

                $checkoutt = Carbon::createFromFormat('d-m-Y', $checkout);


                $BookedPlaces[] = new \Edofre\Fullcalendar\Event([
                    'id' => $id,
                    'title' => $placename,
                    'editable' => false,
                    'startEditable' => false,
                    'durationEditable' => false,
                    'start' => $checkinn,
                    'end' => $checkoutt,
                    'backgroundColor' => '#03a9f3',
                    'borderColor' => '#03a9f3',
                    'textColor' => 'white',
                ]);
                return $BookedPlaces;

            }
        }



    }

    public function profile($user_id)
    {
        $users= User::find($user_id);

        if($users)
        {
            return view('dashboard.profile',compact('users'));
        }

        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }

    public function getchangePassword()
    {
        $user = Auth::user();
        return view('password.changepassword',compact('user'));
    }


    public function changePassword(ChangePasswordRequest $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();

        if(!Hash::check($request->current_password , auth()->user()->password))
        {
            return flash()->success(Lang::get('messages.passwordnotmatch'));
        }

        else
        {
            $user = User::find($user_id);

            if (!$user) {
                flash()->success(Lang::get('messages.usernotfound'));
                return redirect('dashboard');
            } else {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update(array('password' => bcrypt($request->password)));

                flash()->success(Lang::get('messages.passwordUpdated'));
                return redirect('dashboard');
            }
        }
    }

    public function testCupas(SMSService $SMSService)
    {
        $phone_number = "0538262442";
        $phone_number1 = "966538262442";
        $code = mt_rand(000000,999999) . "966only";
        \Log::info('chriscupas log test');
//        $test = $SMSService->prepareSendSMS($phone_number1, $code);
        dd("wow");
    }
}
