@extends('layouts.layout')
@section('breadcrumb')
    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('ownerplaces')}}">{{Lang::get('esteraha.placescontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.editplace')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('content')
    <script>
        function specialoffer() {
            if (document.getElementById("special_offer").checked) {
                document.getElementById("price_offer").style.display = "block";
            } else {
                document.getElementById("price_offer").style.display = "none";
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="/styles.css" />
    @include ('errors.list')

    <link rel="stylesheet" href="/css/lightbox.min.css">

    <style type="text/css">

        .small-img{
            width: 100px !important;height: 100px !important;
        }
    </style>



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.addplacetospecialoffers')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        {!! Form::model($places,['method'=>'PATCH','action'=>['OwnerPlacesController@update',$places->id], 'class'=>'form-horizontal', 'files'=>true ])!!}



                        <div class="row">

                            <div class="col-sm-6 ol-md-6 col-xs-12">
                                <div class="white-box">

                                    @if($places->price_offer ==0)
                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                                <input id="special_offer" type="checkbox" name="special_offer" value="1" onclick='specialoffer()'>
                                                <label for="special_offer">{{Lang::get('esteraha.specialoffers')}}</label>
                                            </div>
                                        </div>
                                    @else

                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                                <input id="special_offer" type="checkbox" name="special_offer" value="1" checked>
                                                <label for="special_offer">{{Lang::get('esteraha.specialoffers')}}</label>
                                            </div>
                                        </div>
                                    @endif


                                    @if($places->special_offer ==1)
                                        <div class="form-group">
                                            <label for="price_offer">{{Lang::get('esteraha.priceoffer')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                                {!! Form::text('price_offer', null,['class'=> 'form-control' ])!!}
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group"  style="display:none;" id="price_offer">
                                            <label for="price_offer">{{Lang::get('esteraha.priceoffer')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                                {!! Form::text('price_offer', null,['class'=> 'form-control'])!!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">{{Lang::get('esteraha.placedescription')}}</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">

                            <div class="col-sm-6 ol-md-6 col-xs-12">
                                <div class="white-box">
                                    <div class="form-group">
                                        <label for="name">{{Lang::get('esteraha.placename')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-direction"></i></div>
                                            {!! Form::text('place_name', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{Lang::get('esteraha.segment')}}</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="gender">
                                                        <option value="{{$places->gender}}">
                                                            @if($places->gender == 'm')
                                                                {{Lang::get('esteraha.male')}}

                                                            @elseif($places->gender == 'f')
                                                                {{Lang::get('esteraha.female')}}

                                                            @elseif($places->gender == 'b')
                                                                {{Lang::get('esteraha.both')}}
                                                            @endif
                                                        </option>
                                                        <option value="m">{{Lang::get('esteraha.male')}}</option>
                                                        <option value="f">{{Lang::get('esteraha.female')}}</option>
                                                        <option value="b">{{Lang::get('esteraha.both')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{Lang::get('esteraha.type')}}</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="type_id">
                                                        <option value="{{$places->type_id}}">{{$tname}}</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="geocomplete" type="text" placeholder="Type in an address"
                                                   name="address"
                                                   class="form-control"
                                                   value="  <?php
                                                   $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.urlencode("$lat,$lng ").'&sensor=false');
                                                   $output= json_decode($geocode);
                                                   if($output->status == 'OK') {
                                                       echo  $output->results[0]->formatted_address;
                                                   }
                                                   ?>
                                                           " />
                                        </div>
                                        <div class="col-md-2">
                                            <input id="find" type="button" value="ابحث"  class="btn btn-success" />
                                        </div>
                                    </div>
                                    <div class="map_canvas"></div>


                                    <div class="form-group">
                                        <label for="price_offer">{{Lang::get('esteraha.address')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                            <a href="http://maps.google.com/?q={{$lat}},{{$lng}}" target="_blank">

                                                <?php
                                                $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.urlencode("$lat,$lng ").'&sensor=false');
                                                $output= json_decode($geocode);
                                                if($output->status == 'OK') {
                                                    echo  $output->results[0]->formatted_address;
                                                }
                                                ?>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>{{Lang::get('esteraha.latitude')}}</label>
                                                {!! Form::text('lat', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{Lang::get('esteraha.longitude')}}</label>
                                                {!! Form::text('lng', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-6 ol-md-6 col-xs-12">
                                <div class="white-box">
                                    <div class="form-group">
                                        <label for="price">{{Lang::get('esteraha.price')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-money"></i></div>
                                            {!! Form::text('price', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{Lang::get('esteraha.description')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-notepad"></i></div>
                                            {!! Form::textarea('description', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            @foreach ($place_amenity as $place_am)
                                                <input id="{{$place_am->id}}" type="checkbox" name="amenity_id[]" value="{{ $place_am->amenity_id }}" checked >
                                                <label for="{{$place_am->id}}">{{$place_am->name}}</label>
                                            @endforeach
                                            @foreach ($place_amenity_not as $place_amn)
                                                <input id="{{$place_amn->id}}" type="checkbox" name="amenity_id[]" value="{{ $place_amn->id }}" >
                                                <label for="{{$place_amn->id}}">{{$place_amn->name}}</label>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 ol-md-6 col-xs-12">
                                            <div class="white-box">
                                                <?php
                                                $path= URL::to('images/Places/'.$places->picture);
                                                ?>
                                                <img src="{!! $path !!}"  alt="img"  style="width: 235px; height: 235px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <div class="row">
            <div class="white-box">
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"> {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>
            {!! Form::Close()!!}
        </div>
        </div>

    </div>

    @section('scripts')
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDy3BphIhjTBffDKhLMG3MBiWep7jZfIfs"></script>
            <script src="/jquery.geocomplete.js"></script>
            <script>
                $(function(){
                    $("#geocomplete").geocomplete({
                        map: ".map_canvas",
                        details: "form ",
                        markerOptions: {
                            draggable: true
                        }
                    });
                    $("#geocomplete").bind("geocode:dragged", function(event, latLng){
                        $("input[name=lat]").val(latLng.lat());
                        $("input[name=lng]").val(latLng.lng());
                        $("#reset").show();
                    });

                    $("#reset").click(function(){
                        $("#geocomplete").geocomplete("resetMarker");
                        $("#reset").hide();
                        return false;
                    });

                    $("#find").click(function(){
                        $("#geocomplete").trigger("geocode");
                    }).click();
                });
            </script>
@stop
@stop






