<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/21/2017
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserControllerRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use App\Models\Role;
use Lang;
use DB;
use Carbon\Carbon;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    public function index(Request $request)
    {

        $users = User::join('roles', 'roles.id', '=', 'users.role_id')
            ->where('code','=','user')
            ->select('users.*')
            ->get();
        return view('user.index', compact('users'))->with('i', 0);

    }


    public function create()
    {
        $users = User::all();

        return view ('user.create',compact('users'));
    }


    public function show($user_id){

        $users  = User::find($user_id);
        if($users)
        {
            return view ('user.show', compact('users'));
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }


    public function store(UserControllerRequest $request){

        $role = Role::select('id')->where('code','=','user')->first();
        $role_id = $role->id;

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();


        DB::table("users")->insert(["name"=>$request->name,"email"=>$request->email,
            "phone_number"=>$request->phone_number, "gender"=>$request->gender,"password"=> bcrypt($request['password']),
            "birth_date"=>$birthdate ,"role_id"=>$role_id,"active"=> 1]);

        flash()->success(Lang::get('messages.addUserSuccessfully'));
        return redirect('users');
    }


    public function edit($user_id)
    {
        $users = User::find($user_id);

        $birthdate = $users->birth_date;

        $date = Carbon::createFromFormat('Y-m-d',$birthdate)->format('d-m-Y');

        if($users)
        {
            return view ('user.edit' , compact('users','date'));
        }

        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }


    public function update($user_id, UpdateAdminRequest $request){

        $role = Role::select('id')->where('code','=','user')->first();
        $role_id = $role->id;

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();


        DB::table('users')
            ->where('id', $user_id)
            ->update(array('name' => $request->name, 'email' => $request->email , 'phone_number' => $request->phone_number
            ,'birth_date' => $birthdate , 'role_id' => $role_id , 'gender' => $request->gender));


        flash()->success(Lang::get('messages.updateUserSuccessfully'));
        return redirect ('users');
    }



    public function destroy ($user_id){

        $users = User::find($user_id);

        if($users)
        {
            $users->delete();
            flash()->success(Lang::get('messages.deleteUserSuccessfully'));
            return redirect ('users');        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }


    }



    public function changePassword(ChangePasswordRequest $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();

        if(!Hash::check($request->current_password , auth()->user()->password))
        {
            return $this->setStatusCode(400)->respondWithError(Lang::get('messages.passwordNotMatch'));
        }

        else
        {

            $user = User::find($user_id);

            if (!$user) {
                return $this->respondNotFound(Lang::get('messages.userNotFound'));
            } else {

                DB::table('users')
                    ->where('id', $user_id)
                    ->update(array('password' => bcrypt($request->password)));

                return $this->respondWithSuccess(Lang::get('messages.passwordUpdated'));
            }
        }
    }





}