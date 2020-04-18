<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierProfile extends Model
{
    protected $table = 'supplier_profile';

    protected $fillable = ['web_address','address','lat','lng',
                           'address_details','street','street_number','code',
                            'country','state','user_id'];
    private static $requestKeyMap = [
        'geoaddress' => 'address',
        'formatted_address' => 'address_details',
        'route' => 'street',
        'postal_code' => 'code',
        'administrative_area_level_1' => 'state',
        'site' => 'web_address'
    ];

    /**
     * register a new supplier or update one if exist
     * @param $request
     * @param $userId
     */
    public static function registerOrUpdate($request,$userId)
    {
        $supplier = self::firstOrNew(['user_id' => $userId]);

        $inputs = self::mapInputs($request);

        $supplier->fill($inputs);

        $supplier->save();
    }

    /**
     * maps the form input names to database columns names and returns something like that
     * ['address' => '12 st anything' , 'street' => 'this is street' ,...]
     * @param $request
     * @return array
     */
    public static function mapInputs($request)
    {
        $inputs = $request->only(['geoaddress','lat','lng','formatted_address','route',
            'street_number','postal_code','country','administrative_area_level_1','site']);


      return collect($inputs)->mapWithKeys(function($value,$key){
            $key = isset(self::$requestKeyMap[$key]) ? self::$requestKeyMap[$key] : $key ;
            return [$key => $value];
        })->toArray();
    }
}
