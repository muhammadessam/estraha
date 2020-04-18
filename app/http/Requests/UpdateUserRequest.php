<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/18/2017
 * Time: 2:37 PM
 */

namespace App\Http\Requests;

use App\Models\User;

use Illuminate\Validation\Rule;


class UpdateUserRequest extends Request
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
        $user_id= auth()->user()->getAuthIdentifier();

        return [
            'name'           => 'required',
            'email'          => 'required|email|unique:users,id,'.$user_id,
            'phone_number'   => 'required|unique:users,phone_number,'.$user_id,
            'gender' 	     => 'required|In:m,f',
            'birth_date' 	 => 'required|date_format:d-m-Y',
        ];
    }









}