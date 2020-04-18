<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 3:52 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Review extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'place_id','user_id','review'
    ];


    public function places()
    {
        return $this->belongsTo('App\Models\Place');
    }


}