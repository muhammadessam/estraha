<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
        return
            [
                'userName'           => 'required',
                'email'          => 'required|email|unique:users,id,'.$this->get('id'),
                'phone_number'   => 'required|unique:users,phone_number,'.$this->get('id'),
                'gender' 	     => 'required|In:m,f',
                'birth_date' 	 => 'required|date_format:d-m-Y',
                'geoaddress' => 'required'
            ];
    }
}
