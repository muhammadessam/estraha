<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/28/2017
 * Time: 8:07 AM
 */

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{

    protected $table = 'device_token';


    protected $fillable = [
        'user_id', 'device_token'
    ];

    public $timestamps = false;

}