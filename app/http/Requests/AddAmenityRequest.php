<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/27/2017
 * Time: 12:16 PM
 */

namespace App\Http\Requests;



class AddAmenityRequest extends Request
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
            'picture'        => 'required|mimes:jpeg,bmp,png,jpg,gif',
        ];

    }



}