<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/27/2017
 * Time: 11:33 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PlaceAmenities extends Model
{

    protected $fillable = [
        'place_id', 'amenity_id'
    ];
    public $timestamps = false;

    protected $table = 'place_amenities';


    public function places()
    {
        return $this->belongsTo('App\Models\Place');
    }


    public function amenities()
    {
        return $this->belongsTo('App\Models\Amenity');
    }



}