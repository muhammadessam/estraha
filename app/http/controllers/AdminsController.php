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
class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    public function index(Request $request)
    {
        $admins = User::join('roles', 'roles.id', '=', 'users.role_id')
                      ->where('code','=','admin')
                      ->select('users.*')
                      ->get();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {

        return view ('admin.create');
    }

    public function show($admin_id)
    {
        $admins  = User::find($admin_id);
        if($admins)
        {
            return view('admin.show', compact('admins'));
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }

    public function store(UserControllerRequest $request){

        $role = Role::select('id')->where('code','=','admin')->first();
        $role_id = $role->id;

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();

        DB::table("users")->insert(["name"=>$request->name,"email" => $request->email,
            "phone_number"=> $request->phone_number, "gender" => $request->gender,
            "password"=> bcrypt($request['password']),
            "birth_date"=>$birthdate ,"role_id"=>$role_id,"active"=> 1]);

        flash()->success(Lang::get('messages.addAdminSuccessfully'));
        return redirect('admins');
    }


    public function edit($admin_id)
    {
        $admins = User::findOrFail($admin_id);

        $birthdate = $admins->birth_date;
        $date = Carbon::createFromFormat('Y-m-d',$birthdate)->format('d-m-Y');


        if($admins)
        {

            return view ('admin.edit' , compact('admins','date'));
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }


    public function update($admin_id, UpdateAdminRequest $request)
    {
        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();

        DB::table('users')
            ->where('id', $admin_id)
            ->update(array('name' => $request->name, 'email' => $request->email , 'phone_number' => $request->phone_number
                           ,'birth_date' => $birthdate, 'gender' => $request->gender));

        flash()->success(Lang::get('messages.updateAdminSuccessfully'));
        return redirect('admins');
    }

    public function destroy ($admin_id)
    {
        $admins = User::findOrFail($admin_id);
        if($admins)
        {
            $admins->delete();
            flash()->success(Lang::get('messages.deleteAdminSuccessfully'));
            return redirect ('admins');        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }



    }













}