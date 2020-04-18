<?php

namespace App\Http\Controllers\Api;

use App;
use App\Esteraha\Services\SMSService;
use App\Http\Requests\SetDeviceTokenRequest;
use App\Transformers\UserTransformer as UserTransformer;
use Auth;
use App\Models\User;
use App\Models\DeviceToken;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use Lang;
use DB;
use Validator;
use Hash;
use Carbon\Carbon;
use App\Esteraha\Helpers\Uploader;
use Illuminate\Support\Facades\Log;

class UserController extends ApiController
{

    private $userTransformer;
    /**
     * @var SMSService
     */
    private $SMSService;
    /**
     * @param UserTransformer $userTransformer
     * @param SMSService $SMSService
     */
    public function __construct(UserTransformer $userTransformer,SMSService $SMSService)
    {
        $this->userTransformer = $userTransformer;
        $this->SMSService = $SMSService;
    }

    public function registerUser(UserRequest $request)
    {
        $name= $request->get('name');
        $email=$request->get('email');
        $password= $request->get('password');
        $phone_number= $request->get('phone_number');
        $gender=  $request->get('gender');
        $birth_date= $request->get('birth_date');
        $role = Role::select('id')->where('code',"user")->first();

        $birth_date = Carbon::createFromFormat('d-m-Y',$birth_date)->toDateString();
        $role_id = $role->id;

            $user = new User();
            $user->name= $name;
            $user->email=$email;
            $user->password=bcrypt($password);
            $user->phone_number=$phone_number;
            $user->gender=$gender;
            $user->birth_date=$birth_date;
            $user->role_id=$role_id;
            $user->save();

            $code = mt_rand(000000,999999);
            $user->activation_code= $code;
            $user->save();

            $sendSMSResult = $this->SMSService->prepareSendSMS($phone_number, $code);

            if($sendSMSResult[0] == 'OK')
            {
                return $this->respondWithSuccess(Lang::get('messages.codesentsuccessfully'));
            }
            else
            {
                return $this->setStatusCode(400)->respondWithError(Lang::get('messages.codenotsent'));
            }

    }

    public function getUserProfile()
    {
        $user_id = auth()->user()->getAuthIdentifier();
        $user = User::find($user_id);

        if (!$user)
        {
            return $this->respondNotFound(Lang::get('messages.userNotFound'));
        }
        else
        {
            return $this->respond([
                'name' => $user->name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'gender' => $user->gender,
                'birth_date' => Carbon::createFromFormat('Y-m-d', $user->birth_date)->format('d-m-Y'),
                'profile_pic_path' => asset('/images/Profile/').'/'. $user->profile_pic
            ]);
        }
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();
        $user = User::find($user_id);

        if (!$user)
        {
            return $this->respondNotFound(Lang::get('messages.userNotFound'));
        }
        else
        {
            $birthDate = Carbon::createFromFormat('d-m-Y', $request->get('birth_date'))->toDateString();

            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number'),
                'gender' => $request->get('gender'),
                'birth_date' => $birthDate,
            ]);

            return $this->respondWithSuccess(Lang::get('messages.profileUpdated'));
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

    public function deviceToken(SetDeviceTokenRequest $request)
    {
        $user = auth()->user();
        $device_token = $request->get('device_token');
        
        if($user->deviceToken)
        {
            DB::table('device_token')
                ->where('user_id', $user->id)
                ->update(array('device_token' => $device_token));

            return $this->respondWithSuccess(Lang::get('messages.updatedevicetokensuccessfully'));
        }
        else
        {
            $token = new DeviceToken();
            $token->device_token = $device_token;
            $token->user_id = $user->id;
            $token->save();

            return $this->respondWithSuccess(Lang::get('messages.devicetokenaddedsuccessfully'));
        }
    }

    public function uploadProfilePic(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'profile_pic' => 'required|image',
        ]);

        if ($validator->fails())
        {

            return $this->setStatusCode(400)->respondWithError(Lang::get('messages.imageFileValidationError'));
        }

        if(!$request->file('profile_pic')->isValid())
        {
            return $this->setStatusCode(400)->respondWithError(Lang::get('messages.imageUploadFail'));

        }

        $currentUser = auth()->user();

        //removing old user profile pic
        if (!is_null($currentUser->profile_pic))
        {
            $oldImagePath = public_path() . '/images/Profile/' . $currentUser->profile_pic;

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imageName = Uploader::upload($request->file('profile_pic'),public_path().'/images/Profile');

        $currentUser->update(['profile_pic' => $imageName]);

        return $this->respondWithSuccess(Lang::get('messages.imageUploadSuccess'));

    }

}
