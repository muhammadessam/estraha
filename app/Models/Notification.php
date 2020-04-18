<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/28/2017
 * Time: 2:09 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{

    protected $table = 'notifications';

    protected $fillable = [
        'data'
    ];


    public $timestamps = false;


}