<?php



/**

 * Created by PhpStorm.

 * User: Isa

 * Date: 3/14/2017

 * Time: 3:53 PM

 */



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;



class Amenity extends Model

{



    protected $fillable = [

        'name', 'picture'

    ];



    public $timestamps = false;



    public function getPictureAttribute($value)

    {

        return URL::to('public/images/Amenities/'.$value);

    }



    public static function getId ($amenities)

    {

        if(is_array($amenities))

        {

          return  collect($amenities)->transform(function($amenity){

                    return self::firstOrCreate(['name' => $amenity])->id;

            })->toArray();



        }



        return self::firstOrCreate(['name' => $amenities])->id;

    }



}