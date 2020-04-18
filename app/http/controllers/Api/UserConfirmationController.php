<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/25/2017
 * Time: 8:14 AM
 */

namespace App\Http\Controllers\Api;

use App\Esteraha\Services\SMSService;
use Illuminate\Http\Request;
use App\Models\User;
use Lang;


class UserConfirmationController extends ApiController
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

    public function postConfirmation(Request $request)
    {
        $code = $request->get('code');
        $phone = $request->get('phone_number');

        $user = User::where('phone_number', $phone)->first();

        if ($user) {

            if($user->active)
            {
                return $this->setStatusCode(400)->respondWithError(Lang::get('messages.userAlreadyActivated'));
            }else{

                $activation_code = $user->activation_code;

                if($code == $activation_code){
                    $user->active = 1;
                    $user->save();
                    return $this->respondWithSuccess(Lang::get('messages.activationsuccess'));
                }
                else
                {
                    return $this->setStatusCode(400)->respondWithError(Lang::get('messages.codenotmatch'));
                }
            }
        }
        else
        {
            return $this->respondNotFound(Lang::get('messages.userNotFound'));
        }
    }


}