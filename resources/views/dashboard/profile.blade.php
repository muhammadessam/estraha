@extends('layouts.layout')
@section('content')
    @include('flash::message')

    <style>
        h2,h3{
            color: dodgerblue;
            font-family: 'Droid Arabic Kufi', serif !important;

        }
    </style>

    <div class="row">
        <div class="col-md-8 col-xs-12"  style="margin-right:250px;">
            <div class="white-box">
                <div class="user-bg" style="height:400px;">
                    <div class="overlay-box" style="background: white; color: royalblue;">
                        <div class="user-content"> <a href="javascript:void(0)"></a>
                            <h2>{{Lang::get('esteraha.username')}} : {!!$users->name!!}</h2>
                            <h3>{{Lang::get('esteraha.email')}} : {!!$users->email!!}</h3>
                            <h3>{{Lang::get('esteraha.phoneNumber')}} : {!!$users->phone_number!!}</h3>
                            <h3>{{Lang::get('esteraha.gender')}} :
                                @if($users->gender == 'm')
                                    {{Lang::get('esteraha.male')}}
                                @elseif($users->gender == 'f')
                                    {{Lang::get('esteraha.female')}}
                                @endif
                            </h3>
                            <h3>{{Lang::get('esteraha.birthdate')}} : {!!$users->birth_date!!}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>







@stop