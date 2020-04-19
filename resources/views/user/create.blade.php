@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('users')}}">{{Lang::get('esteraha.userscontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.adduser')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('content')


    {!! Form::open(array('url' => url('users'), 'class'=>'form-horizontal' , 'files'=>true )) !!}
    @include ('errors.list')


    @include ('user.form' , ['submit' => 'Add'])


    {!! Form::Close()!!}

@stop