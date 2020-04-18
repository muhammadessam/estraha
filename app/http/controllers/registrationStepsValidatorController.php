<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class registrationStepsValidatorController extends Controller
{
    protected $validationStepsRules = [

        '1' => [
            'userName' => 'required',
            'email' => 'required|email|unique:users,email',
            'newpassword' => 'required',
            'confirmPass' => 'required|same:newpassword',            
            'mobile' => 'required|regex:/(05)[0-9]{8}/|unique:users,phone_number',
            'geoaddress' => 'required',
            'type' => 'required',
            'numbers' => 'required',
        ],
        '2' => [
            'places.*.place_name' => 'required'
        ],
        '3' => []

    ];

    public function validateStep(Request $request)
    {
        $data = $request->input('data') == null ? [] : $request->input('data');

            if($request->input('step') == 2) {

                $data['places'] = [];

                foreach ($request->input('data') as $place) {
                    $data['places'] [] = $place;
                }
            }

            $error = $this->validator($data, $this->validationStepsRules[$request->input('step')]);

            if ($error == null) {
                return response()->json(['success' => '']);
            }

        return response()->json(['errors' => $error],200);

    }


    protected function validator(array $data,$rules)
    {
        $messages = $this->getValidationErrorMessages();

        $validator = Validator::make($data, $rules,$messages);

        if ($validator->fails())
        {
           return $validator->getMessageBag()->toArray();
        }

        return null;
    }

    private function getValidationErrorMessages()
    {
        return [
            'email.required' => 'الايميل مطلوب',
            'email.unique' => 'الايميل مُكرر',
            'email.email' => 'الايميل يجب ان يكون عنوان باريد إلكترونى',
            'password.required' => 'كلمة المرور مطلوبة',
            'mobile.required' => 'الجوال مطلوب',
            'mobile.unique' => 'الجوال مُكرر',
            'userName.required' => 'الاسم كامل مطلوب',
            'type.required' => 'نوع المكان مطلوب',
            'geoaddress.required' => 'العنوان مطلوب',
            'numbers.required' => 'عدد الأماكن التى تريد إضافتها مطلوب',
            'places.*.place_name.required' => 'الاسم المخصص مطلوب فى جميع الاماكن',
            'image.image' => 'صور الأماكن يجب ان تكون من نوع ملفات الصور'
        ];
    }


    public function validateImage(Request $request)
    {
        $messages = $this->getValidationErrorMessages();

        $validator = Validator::make(['image' => $request->file('image')], ['image' => 'image'],$messages);

        if ($validator->fails())
        {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json(['errors' => $errors],200);
        }

        return response()->json(['success' => '']);
    }
}
