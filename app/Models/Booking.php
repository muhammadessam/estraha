<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 4:10 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{


    public $timestamps = false;

    protected $check_in ,$check_out;

    public function getCheckIn()
    {
        return $this->check_in;
    }

    public function setCheckIn($value)
    {
        $this->check_in = $value;
    }

    public function getCheckOut()
    {
        return $this->check_out;
    }

    public function setCheckOut($value)
    {
        $this->check_out = $value;
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function owners()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function places()
    {
        return $this->belongsTo('App\Models\Place');
    }


    public function getPriceAttribute($value)
    {
        return $value/100;
    }


    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value*100;
    }

    public function scopeInterval($query,$check_in,$check_out)
    {
        $query->whereNotBetween('check_in', array($check_in, $check_out))
              ->whereNotBetween('check_out', array($check_in, $check_out));
    }

}