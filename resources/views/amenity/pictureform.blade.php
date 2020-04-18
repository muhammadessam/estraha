@extends('layouts.layout')
@section('breadcrumb')
    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('amenities')}}">{{Lang::get('esteraha.amenitiescontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.editamenity')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
@section('content')

    <div class="row">
    {!! Form::model($amenities,['method'=>'PATCH','action'=>['AmenitiesController@update',$amenities->id], 'class'=>'form-horizontal form-material','files'=>true ])!!}
    @include ('errors.list')



        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.amenitiescontrol')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
            <div class="white-box">

                <div class="row">
                    <div class="col-sm-12 col-xs-12">


                        <div class="form-group">
                            <label for="name">{{Lang::get('esteraha.amenityname')}}</label>
                            <div class="input-group">
                               
                                {!! Form::text('name', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                            </div>
                        </div>
                    </div>
                                <?php

                                $path= $amenities->picture;
                                ?>
                                <img src="{!! $path !!}"  alt="img"  style="width: 235px; height: 235px">

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

                </div>
            </div>
        </div>
                </div>
            </div>
        </div>



    {!! Form::Close()!!}



    {!! Form::model($amenities,['method'=>'PATCH','action'=>['AmenitiesController@updatePicture',$amenities->id], 'class'=>'form-horizontal','files'=>true ])!!}

    <!--.row-->

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.editpicture')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
        

                <div class="form-group">
                  <label for="picture">{{Lang::get('esteraha.uploadpicture')}}</label>
                   <input type="file" id="input-file-now" class="dropify" name="picture" />
                </div>
               

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

        </div>


    {!! Form::Close()!!}
    </div>
            </div>
        </div>
    </div>
@stop
