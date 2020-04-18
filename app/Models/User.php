<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SupplierProfile;
use League\OAuth2\Server\Exception\OAuthServerException;
use Hash;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email','phone_number','gender','birth_date','password','role_id','profile_pic'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public $timestamps = false;

    public function supplierProfile()
    {
        return $this->hasOne(SupplierProfile::class);
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function userpasswordresets()
    {
        return $this->hasOne('App\Models\UserPasswordResets');
    }

    public function deviceToken()
    {
        return $this->hasOne('App\Models\DeviceToken');
    }

    public function hasRole($role)
    {
        $user = $this;

        if($user->role->code == $role)
        {
            return true;
        }else{
            return false;
        }
    }

    public function findForPassport($username)
    {
        $pw =  request()->input('password');

        $user = $this->where('phone_number', $username)->first();

        if (is_null($user) || !Hash::check($pw, $user->password))
        {
            throw new OAuthServerException(Lang::get('auth.failed'), 6, 'invalid_credentials', 401);
        }

        if($user->active == 0)
        {
            throw new OAuthServerException(Lang::get('messages.userInActive'), 6, 'inactive', 400);
        }
        
        return $user;
    }

    public function getFromDateAttribute($value) {
        Carbon::createFromFormat('Y-m-d',$value)->format('d-m-Y');
    }


    /**
     * this function registers a user or update it's info based on phone number
     * @param $request
     * @return mixed
     */
    public static function registerOrUpdate($request)
    {
        $user = self::firstOrNew(['phone_number' => $request->input('mobile')]);

        $user->name = $request->input('userName');
        $user->email = $request->input('email');

        if ($user->password == null)
        {
            $user->gender = 'm';
            $user->birth_date = Carbon::now()->toDateString();
            $user->role_id = Role::select('id')->where('code','=','supplier')->first()->id;
            $user->created_at = Carbon::now()->toDateTimeString();
        }

        $user->password = bcrypt($request->input('newpassword'));
        $user->updated_at = Carbon::now()->toDateTimeString();

        $user->save();

        return $user;
    }

}
