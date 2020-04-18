<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 3:52 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Role extends Model
{

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }


}