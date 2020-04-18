<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/15/2017
 * Time: 11:21 AM
 */

namespace App\Transformers;


class UserTransformer extends Transformer
{

    public function transform($user)
    {
        return [
            'name' => $user['name'],
            'email'   => $user['email'],
            'password' => $user['password'],
            'phone_number' => $user['phone_number'],
            'gender' => $user['gender'],
            'birth_date' => $user['birth_date'],
        ];
    }




}