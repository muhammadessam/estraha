<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOwnerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userName'           => 'required',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|between:6,15',
            'password_confirm' => 'required|same:password|between:6,15' ,
            'phone_number'   => 'required|unique:users',
            'gender' 	     => 'required|In:m,f',
            'birth_date' 	 => 'required|date_format:d-m-Y',
            'geoaddress' => 'required'

        ];
    }
}
