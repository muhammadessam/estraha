@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('users')}}">{{Lang::get('esteraha.userscontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.edituser')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

@section('content')


    {!! Form::model($users,['method'=>'PATCH','action'=>['UsersController@update',$users->id], 'class'=>'form-horizontal'])!!}

    {!! Form::hidden('id', $users->id) !!}

    @include ('errors.list')


    @include('user.form')


    {!! Form::Close()!!}



@stop
