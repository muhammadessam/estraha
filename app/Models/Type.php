<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 3:52 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public $timestamps = false;


    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }


}