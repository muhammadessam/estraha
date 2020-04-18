<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/25/2017
 * Time: 2:18 PM
 */

namespace App\Http\Controllers\Api;
use App\Esteraha\Services\SMSService;
use Lang;
use DB;
use App\Models\User;
use App\Models\UserPasswordResets;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;


class ResetPasswordController extends ApiController
{
    protected $sendsms;
    /**
     * @var SMSService
     */
    private $SMSService;

    /**
     * UserConfirmationController constructor.
     * @param SMSService $SMSService
     */
    public function __construct(SMSService $SMSService)
    {
        $this->SMSService = $SMSService;
    }

    public function postSentCode(Request $request)
    {
        $phone_number = $request->get('phone_number');

        $user =  User::select('*')->where('phone_number', $phone_number)->first();

        if($user)
        {
            $user_id = $user->id;

            $code = mt_rand(000000,999999);

            DB::table("user_password_resets")->insert(["code"=> $code,"phone_number"=> $phone_number,
                "user_id"=>$user_id]);

            $sendSMSResult = $this->SMSService->prepareSendSMS($phone_number, $code);

            if($sendSMSResult[0] == 'OK')
            {
                return $this->respondWithSuccess(Lang::get('messages.codesentsuccessfully'));
            }
            else
            {
                return $this->setStatusCode(400)->respondWithError($sendSMSResult[1]);
            }
        }
        else {
            return $this->setStatusCode(400)->respondWithError(Lang::get('messages.userNotFound'));
        }

    }



    public function postResetPassword(PasswordRequest $request )
    {
        $code = $request->get('code');
        $password = $request->get('password');

        $activation_code =  UserPasswordResets::select('*')->where('code', $code)->first();

        if ($activation_code) {
            $user_id = $activation_code->user_id;

            DB::table('users')
                ->where('id', $user_id)
                ->update(array('password' => bcrypt($password)));

                return $this->respondWithSuccess(Lang::get('messages.passwordresetsuccessfully'));
            }
            else
            {
                return $this->setStatusCode(400)->respondWithError(Lang::get('messages.codenotmatch'));
            }
    }
}