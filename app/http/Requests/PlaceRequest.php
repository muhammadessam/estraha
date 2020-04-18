<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/27/2017
 * Time: 12:46 PM
 */

namespace App\Http\Requests;


class PlaceRequest extends Request
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
            'place_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'price_offer' => 'required_with:special_offer',
        ];

    }
}
