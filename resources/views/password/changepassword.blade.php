@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.changepassword')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('content')

    <div class="row">

    {!! Form::model($user,['method'=>'PATCH','action'=>['HomeController@changePassword'], 'class'=>'form-horizontal', 'files'=>true ])!!}
    @include ('errors.list')

    <!--.row-->
        <link rel="stylesheet" type="text/css" href="/styles.css" />

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.changepassword')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">


            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">

                        <div class="form-group">
                            <label for="name">{{Lang::get('esteraha.currentpassword')}}</label>
                            <div class="input-group">
                             
                                {!! Form::password('current_password', ['class'=> 'form-control'  , 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">{{Lang::get('esteraha.password')}}</label>
                            <div class="input-group">
                               
                                {!! Form::password('password', ['class'=> 'form-control' , 'required'=>'required'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rooms">{{Lang::get('esteraha.confirmpassword')}}</label>
                            <div class="input-group">
                               
                                {!! Form::password('password_confirm', ['class'=> 'form-control' , 'required'=>'required'])!!}
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"  > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

                    </div>
                </div>
            </div>
        </div>



    {!! Form::Close()!!}

    </div>

            </div>
        </div>
    </div>
@stop
