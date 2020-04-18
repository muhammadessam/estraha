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
use App\Http\Requests\CreateOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\SupplierProfile;
use Lang;
use DB;
use Carbon\Carbon;

class OwnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }



    public function index(Request $request)
    {

        $owners = User::join('roles', 'roles.id', '=', 'users.role_id')
            ->where('code','=','supplier')
            ->select('users.*')
            ->get();

        return view('owner.index', compact('owners'));

    }


    public function create()
    {
        $owners = new User();
        $supplier = $owners->supplierProfile;
        return view ('owner.create',compact('owners','supplier'));
    }


    public function show($owner_id){

        $owners  = User::find($owner_id);

        if($owners)
        {
            return view ('owner.show', compact('owners'));
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }


    public function store(CreateOwnerRequest $request){


        $role = Role::select('id')->where('code','=','supplier')->first();
        $role_id = $role->id;

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();


       $user = User::create(["name"=>$request->userName,"email"=>$request->email,
            "phone_number"=>$request->phone_number, "gender"=>$request->gender,
            "password"=> bcrypt($request->password),
            "birth_date"=>$birthdate ,"role_id"=>$role_id,"active"=> 1]);

        SupplierProfile::registerOrUpdate($request,$user->id);

        flash()->success(Lang::get('messages.addOwnerSuccessfully'));
        return redirect('owners');
    }


    public function edit($owner_id)
    {
        $owners = User::find($owner_id);
        $supplier = $owners->supplierProfile;

        $birthDate = $owners->birth_date;

        $date = Carbon::createFromFormat('Y-m-d',$birthDate)->format('d-m-Y');

        if($owners)
        {
            return view ('owner.edit' , compact('owners','date','supplier'));
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }
    }


    public function update($owner_id, UpdateOwnerRequest $request){

        $role = Role::select('id')->where('code','=','supplier')->first();
        $role_id = $role->id;

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->toDateString();


        DB::table('users')
            ->where('id', $owner_id)
            ->update(array('name' => $request->userName, 'email' => $request->email , 'phone_number' => $request->phone_number
            ,'birth_date' => $birthdate , 'role_id' => $role_id , 'gender' => $request->gender));

        SupplierProfile::registerOrUpdate($request,$owner_id);

        flash()->success(Lang::get('messages.updateOwnerSuccessfully'));
        return redirect ('owners');
    }



    public function destroy ($owner_id){

        $owners = User::find($owner_id);

        if($owners)
        {
            $owners->delete();

            flash()->success(Lang::get('messages.deleteOwnerSuccessfully'));
            return redirect ('owners');
        }
        else
        {
            flash()->success(Lang::get('messages.usernotfound'));
            return redirect()->back();
        }


    }








}