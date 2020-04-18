<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }




    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $admin_role = Role::select('id')->where('code','=','admin')->first();
            $supplier_role = Role::select('id')->where('code','=','supplier')->first();

            $admin = $admin_role->id;
            $supplier = $supplier_role->id;

            if(Auth::user()->role_id== $admin || Auth::user()->role_id== $supplier)
            {
                return $this->sendLoginResponse($request);
            }

            else
            {
                $this->guard()->logout();
                return redirect('login');
            }
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);


    }


}
