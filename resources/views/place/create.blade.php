@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('places')}}">{{Lang::get('esteraha.placescontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.addplace')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

@section('content')

    {!! Form::open(array('url' => url('places'), 'class'=>'form-horizontal ajaxForm' , 'files'=>true )) !!}

    @include ('errors.list')


    @include ('place.form' , ['submit' => 'Add'])

    {!! Form::Close()!!}


@stop