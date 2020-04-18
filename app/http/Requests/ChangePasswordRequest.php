<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/18/2017
 * Time: 2:37 PM
 */

namespace App\Http\Requests;


class ChangePasswordRequest extends Request
{




    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'       => 'required|between:6,15',
            'password_confirm' => 'required|same:password|between:6,15',
        ];
    }


}