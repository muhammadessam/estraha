<?php



namespace App\Http\Controllers\Auth;



use App\Models\User;

use App\Models\SupplierProfile;

use App\Models\Place;

use App\Models\Type;

use App\Models\Amenity;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;



class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**

     * Where to redirect users after registration.

     *

     * @var string

     */

    protected $redirectTo = '/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        return Validator::make($data, [

            'userName' => 'required',
            'newpassword' => 'required',
            'confirmPass' => 'required|same:newpassword',
            'email' => 'required|email|unique:users,email',

            'mobile' => 'required|regex:/(05)[0-9]{8}/|unique:users,phone_number',

            'geoaddress' => 'required',

            'type' => 'required',

            'numbers' => 'required',

            'places_images.*' => 'sometimes|image',

            'places.*.place_name' => 'required'

        ],[

            'email.required' => 'الايميل مطلوب',
            'password.required' => 'كلمة المرور مطلوبة',
            'email.unique' => 'الايميل مُكرر',

            'email.email' => 'الايميل يجب ان يكون عنوان باريد إلكترونى',

            'mobile.required' => 'الجوال مطلوب',

            'mobile.unique' => 'الجوال مُكرر',

            'userName.required' => 'الاسم كامل مطلوب',

            'type.required' => 'نوع المكان مطلوب',

            'geoaddress.required' => 'العنوان مطلوب',

            'numbers.required' => 'عدد الأماكن التى تريد إضافتها مطلوب',

            'places.*.place_name.required' => 'الاسم المخصص مطلوب فى جميع الاماكن',

            'places_images.*.image' => 'صور الأماكن يجب ان تكون من نوع ملفات الصور'

        ]);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    protected function create(array $data)

    {
        
        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

        ]);

    }



    public function showRegistrationIntroPage()

    {

       return view('auth.register-intro');

    }

    /**

     * Show the application registration form.

     *

     * @return \Illuminate\Http\Response

     */

    public function showRegistrationForm()

    {

        $types = Type::all();

        $amenities = Amenity::all();

        return view('auth.register',compact('types','amenities'));

    }



    /**

     * Handle a registration request for the application.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function register(Request $request)

    {

       $validator =  $this->validator($request->all());



        if ($validator->fails())

        {

            return response()->json(['errors' => $validator->getMessageBag()->toArray()],200);



        }

        

        $user = User::registerOrUpdate($request);



        SupplierProfile::registerOrUpdate($request,$user->id);



        Place::saveSupplierPlaces($request,$user->id);



        return ['success' => true , 'message' => 'لقد تم تخزين البيانات بنجاح'];

    }

}

