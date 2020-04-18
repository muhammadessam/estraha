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
use App\Models\Notification;
use Auth;
use Lang;
use Image;
use DB;


class NotificationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');


    }

    public function index()
    {
        $notifications = Notification::all();
        return view('notification.index', compact('notifications'));
    }


    public function create()
    {
        $notifications= Notification::all();
        return view ('notification.create',compact('notifications'));
    }


    public function store(Request $request){

        Notification::create($request->all());

        flash()->success(Lang::get('messages.addNotificationSuccessfully'));
        return redirect('places');
    }



    public function destroy ($notification_id){

        $notifications = Notification::find($notification_id);

        if($notifications)
        {
            $notifications->delete();

            flash()->success(Lang::get('messages.deleteNotificationSuccessfully'));
            return redirect ('notifications');        }
        else
        {
            flash()->success(Lang::get('messages.notificationnotfound'));
            return redirect()->back();
        }
    }
}