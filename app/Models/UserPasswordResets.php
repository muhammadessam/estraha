<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/14/2017
 * Time: 3:54 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserPasswordResets extends Model
{

    protected $table = 'user_password_resets';


    protected $fillable = [
        'user_id', 'code','phone_number'
    ];

    public $timestamps = false;


    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

}