<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Picture extends Model
{

    protected $table = 'place_pictures';

    protected $fillable = [
        'name', 'place_id'
    ];

    public $timestamps = false;

    public function places()
    {
        return $this->belongsTo('App\Models\Place');
    }

    public function getNameAttribute($value)
    {
        return URL::to('images/Places/'.$value);
    }

}