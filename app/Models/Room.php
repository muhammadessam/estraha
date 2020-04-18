<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 3:55 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $table = 'place_rooms';


    public $timestamps = false;


    public function places()
    {
        return $this->belongsTo('App\Models\Place');
    }




}