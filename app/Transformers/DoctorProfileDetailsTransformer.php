<?php namespace App\Transformers;

class DoctorProfileDetailsTransformer extends Transformer
{

    public function transform($doctor)
    {
        return [
            'id' => $doctor['id'],
            'first_name' => $doctor['first_name'],
            'last_name'   => $doctor['last_name'],
            'title' => $doctor['title'],
            'gender' => $doctor['gender'],
            'nationality' => $doctor['nationality'],
            'about' => $doctor['about'],
            'image' => $doctor['image'],
            'speciality' => $doctor['doctorSpeciality'],
            'doctor_profile' => $doctor['doctorProfile'],
        ];
    }

}