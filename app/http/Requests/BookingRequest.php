<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/18/2017
 * Time: 2:37 PM
 */

namespace App\Http\Requests;


class BookingRequest extends Request
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
            'city'           => 'required',
            'email'          => 'required|email',
            'phone_number'   => 'required',
            'check_in' 	     => 'required_with:check_out|date_format:d-m-Y',
            'check_out' 	 => 'required_with:check_in|date_format:d-m-Y|after:check_in',
            'payment_method' => 'required',
        ];
    }









}