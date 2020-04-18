<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Esteraha\Helpers\Uploader;
use Carbon\Carbon;

class Place extends Model
{

    protected $fillable = [
        'place_name', 'email','phone_number','gender','price','description','lat','lng','special_offer',
        'price_offer','owner_id','type_id','checkin_start','checkin_end','stars','inner_room','double_rooms_count',
        'single_rooms_count','sleep_room','address','created_at','updated_at','deposit','deposit_amount','deposit_days'
    ];

    public $timestamps = false;

    public function amenities()
    {
        return $this->belongsToMany('App\Models\Amenity', 'place_amenities');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function types()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }

    public function pictures()
    {
        return $this->hasMany('App\Models\Picture');
    }

    public function getPriceAttribute($value)
    {
        return $value/100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value*100;
    }

    public function getPriceOfferAttribute($value)
    {
        return $value/100;
    }

    public function setPriceOfferAttribute($value)
    {
        $this->attributes['price_offer'] = $value*100;
    }

    public function scopeDistance($query,$lat,$lng)
    {
        $query->select(
            DB::raw("*, (6371 * acos(cos(radians($lat)) * cos(radians(lat))
                              * cos(radians(lng) - radians($lng)) + sin(radians($lat))
                              * sin(radians(lat)))) AS distance"));
    }

    public function scopeInterval($query,$check_in,$check_out)
    {
        $query->whereNotBetween('check_in', array($check_in, $check_out))
              ->whereNotBetween('check_out', array($check_in, $check_out));
    }

    public function scopeBookInterval($query,$check_in,$check_out)
    {
        $query->whereBetween('check_in', array($check_in, $check_out))
              ->whereBetween('check_out', array($check_in, $check_out));
    }

    public static function rules()
    {
        return [
            'type' => 'numeric',
            'placecategory' => 'In:m,f,',
            'checkin' => 'required_with:checkout|date_format:d-m-Y',
            'checkout' => 'required_with:checkin|date_format:d-m-Y',
        ];
    }

    public static function locationRules()
    {
        return [
            'lat' => 'required_if:type,==,location',
            'lng' => 'required_with:lat',
        ];
    }

    public static function saveSupplierPlaces($request,$supplierId)
    {
        $typeId = Type::where('name',$request->input('type'))->first()->id;

        $places  = collect($request->input('places'));

        $imageNames = null;

        if ($request->file('places_images') != null)
        {
            $imageNames = Uploader::upload($request->file('places_images'),public_path().'/images/Places');

        }

        $places->each(function($place) use ($supplierId,$typeId,$request,$imageNames){

            $data = Place::getFormattedData($place,$supplierId,$typeId,$request);

            $eloquentPlace = Place::create($data);

            if(isset($place['newAmenity']))
            {
                $place['amenities'][] = $place['newAmenity'];
            }

            if (isset($place['amenities']) )
            {
                $amenitiesIds = Amenity::getId($place['amenities']);

                $eloquentPlace->amenities()->sync($amenitiesIds);
            }

            if ($imageNames != null)
            {
                $picsData = collect($imageNames)->transform(function($imageName) use ($eloquentPlace){
                    return ['place_id' => $eloquentPlace->id , 'name' => $imageName];
                })->toArray();

                Picture::insert($picsData);
            }
        });


    }

    public static function getFormattedData($place,$supplierId,$typeId,$request)
    {
        $data = [
            'place_name' => $place['place_name'],
            'checkin_start' => $place['checkin_start'],
            'checkin_end' => $place['checkin_end'],
            'stars' => $place['stars'],
            'gender' => $place['gender'],
            'description' => $place['description'],
            'price' => $place['price'],
            'inner_room' => $place['inner_room'],
            'sleep_room' => $place['sleep_room'] =='yes' ? 1 : 0,
            'owner_id' => $supplierId,
            'type_id' => $typeId,
            'lat' => $request->input('lat') != null ? $request->input('lat') : 24.457254358585377 ,
            'lng' => $request->input('lng') != null ? $request->input('lng') : 45.8866571171875,

            'deposit' => $place['deposit'] =='1' ? 1 : 0,
            'deposit_amount' => $place['deposit_amount'],
            'deposit_days' => $place['deposit_day'],
        ];

        if ($place['sleep_room'] == 'yes')
        {
            $bedsType = collect($place['type_bed']);
            $data['double_rooms_count'] = $bedsType->filter(function($item){ return $item =='two';})->count();
            $data['single_rooms_count'] = $bedsType->filter(function($item){return $item == 'one';})->count();
        }
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        return $data;
    }

}