<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/18/2017
 * Time: 2:37 PM
 */

namespace App\Http\Requests;


class UserControllerRequest extends Request
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
            'name'           => 'required',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|between:6,15',
            'password_confirm' => 'required|same:password|between:6,15' ,
            'phone_number'   => 'required|unique:users',
            'gender' 	     => 'required|In:m,f',
            'birth_date' 	 => 'required|date_format:d-m-Y',


        ];

    }









}