@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('owners')}}">{{Lang::get('esteraha.ownerscontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.editowner')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('content')


    {!! Form::model($owners,['method'=>'PATCH','action'=>['OwnersController@update',$owners->id], 'class'=>'form-horizontal'])!!}

    {!! Form::hidden('id', $owners->id) !!}

    @include ('errors.list')


    @include ('owner.form' , ['submit' => 'Add'])


    {!! Form::Close()!!}


@stop
