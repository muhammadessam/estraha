@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('places')}}">{{Lang::get('esteraha.placescontrol')}}</a></li>
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

        <?php $userRole = Auth::user()->role->code;?>
        <?php $disabled = ($userRole == 'admin') ? 'disabled' : '';?>
      @if($userRole == 'admin')

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.addplacetospecialoffers')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <form class="form-horizontal ajaxForm" action="{{route('update.place.priceOffer',$places->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
        <div class="row">
        <div class="col-sm-6 ol-md-6 col-xs-12">
            <div class="white-box">

                    <div class="form-group">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="special_offer" type="checkbox" name="special_offer" value="1" @if($places->special_offer	 ==1) checked @endif onclick='specialoffer()'>
                            <label for="special_offer">{{Lang::get('esteraha.specialoffers')}}</label>
                        </div>
                    </div>



                    <div class="form-group"  @if($places->special_offer	 ==0)style="display:none;"@endif id="price_offer">
                        <label for="price_offer">{{Lang::get('esteraha.priceoffer')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="text" class="form-control" name="price_offer" value="{{$places->price_offer}}"  >
                        </div>
                    </div>

            </div>
        </div>
    </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

                        {!! Form::Close()!!}
                    </div>
               </div>
          </div>
     </div>
@endif







    <div class="col-md-12">

            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.placedescription')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        {!! Form::model($places,['method'=>'PATCH','action'=>['PlacesController@update',$places->id], 'class'=>'form-horizontal ajaxForm', 'files'=>true ])!!}
                        <div class="col-sm-6 ol-md-6 col-xs-12">
                            <div class="white-box">
                                <div class="form-group">
                                    <label for="name">{{Lang::get('esteraha.placename')}}</label>
                                    <div class="input-group">
                                     
                                        {!! Form::text('place_name', null,['class'=> 'form-control'  , 'required'=>'required','placeholder' =>Lang::get('esteraha.placename') , $disabled])!!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="checkin_start" class="col-sm-6">تسجيل الوصول</label>
                                    <select class="form-control" id="checkin_start" name="checkin_start" {{$disabled}} >
                                        <option value="07:00" @if($places->checkin_start == '07:00') selected @endif>7:00&nbsp;صباحًا</option>
                                        <option value="07:30" @if($places->checkin_start == '07:30') selected @endif>7:30&nbsp;صباحًا</option>
                                        <option value="08:00" @if($places->checkin_start == '08:00') selected @endif>8:00&nbsp;صباحًا</option>
                                        <option value="08:30" @if($places->checkin_start == '08:30') selected @endif>8:30&nbsp;صباحًا</option>
                                        <option value="09:00" @if($places->checkin_start == '09:00') selected @endif>9:00&nbsp;صباحًا</option>
                                        <option value="09:30" @if($places->checkin_start == '09:30') selected @endif>9:30&nbsp;صباحًا</option>
                                        <option value="10:00" @if($places->checkin_start == '10:00') selected @endif>10:00&nbsp;صباحًا</option>
                                        <option value="10:30" @if($places->checkin_start == '10:30') selected @endif>10:30&nbsp;صباحًا</option>
                                        <option value="11:00" @if($places->checkin_start == '11:00') selected @endif>11:00&nbsp;صباحًا</option>
                                        <option value="11:30" @if($places->checkin_start == '11:30') selected @endif>11:30&nbsp;صباحًا</option>
                                        <option value="12:00" @if($places->checkin_start == '12:00') selected @endif>12:00&nbsp;مساءً</option>
                                        <option value="12:30" @if($places->checkin_start == '12:30') selected @endif>12:30&nbsp;مساءً</option>
                                        <option value="13:00" @if($places->checkin_start == '13:00') selected @endif>1:00&nbsp;مساءً</option>
                                        <option value="13:30" @if($places->checkin_start == '13:30') selected @endif>1:30&nbsp;مساءً</option>
                                        <option value="14:00" @if($places->checkin_start == '14:00') selected @endif>2:00&nbsp;مساءً</option>
                                        <option value="14:30" @if($places->checkin_start == '14:30') selected @endif>2:30&nbsp;مساءً</option>
                                        <option value="15:00" @if($places->checkin_start == '15:00') selected @endif>3:00&nbsp;مساءً</option>
                                        <option value="15:30" @if($places->checkin_start == '15:30') selected @endif>3:30&nbsp;مساءً</option>
                                        <option value="16:00" @if($places->checkin_start == '16:00') selected @endif>4:00&nbsp;مساءً</option>
                                        <option value="16:30" @if($places->checkin_start == '16:30') selected @endif>4:30&nbsp;مساءً</option>
                                        <option value="17:00" @if($places->checkin_start == '17:00') selected @endif>5:00&nbsp;مساءً</option>
                                        <option value="17:30" @if($places->checkin_start == '17:30') selected @endif>5:30&nbsp;مساءً</option>
                                        <option value="18:00" @if($places->checkin_start == '18:00') selected @endif>6:00&nbsp;مساءً</option>
                                        <option value="18:30" @if($places->checkin_start == '18:30') selected @endif>6:30&nbsp;مساءً</option>
                                        <option value="19:00" @if($places->checkin_start == '19:00') selected @endif>7:00&nbsp;مساءً</option>
                                        <option value="19:30" @if($places->checkin_start == '19:30') selected @endif>7:30&nbsp;مساءً</option>
                                        <option value="20:00" @if($places->checkin_start == '20:00') selected @endif>8:00&nbsp;مساءً</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="checkin_end" class="col-sm-6">تسجيل المغادرة</label>
                                    <select class="form-control" id="checkin_end" name="checkin_end" {{$disabled}}>
                                        <option value="12:00"  @if($places->checkin_end == '12:00') selected @endif>12:00&nbsp;مساءً</option>
                                        <option value="12:30" @if($places->checkin_end == '12:30') selected @endif>12:30&nbsp;مساءً</option>
                                        <option value="13:00" @if($places->checkin_end == '13:00') selected @endif>1:00&nbsp;مساءً</option>
                                        <option value="13:30" @if($places->checkin_end == '13:30') selected @endif>1:30&nbsp;مساءً</option>
                                        <option value="14:00" @if($places->checkin_end == '14:00') selected @endif>2:00&nbsp;مساءً</option>
                                        <option value="14:30" @if($places->checkin_end == '14:30') selected @endif>2:30&nbsp;مساءً</option>
                                        <option value="15:00" @if($places->checkin_end == '15:00') selected @endif>3:00&nbsp;مساءً</option>
                                        <option value="15:30" @if($places->checkin_end == '15:30') selected @endif>3:30&nbsp;مساءً</option>
                                        <option value="16:00" @if($places->checkin_end == '16:00') selected @endif>4:00&nbsp;مساءً</option>
                                        <option value="16:30" @if($places->checkin_end == '16:30') selected @endif>4:30&nbsp;مساءً</option>
                                        <option value="17:00" @if($places->checkin_end == '17:00') selected @endif>5:00&nbsp;مساءً</option>
                                        <option value="17:30" @if($places->checkin_end == '17:30') selected @endif>5:30&nbsp;مساءً</option>
                                        <option value="18:00" @if($places->checkin_end == '18:00') selected @endif>6:00&nbsp;مساءً</option>
                                        <option value="18:30" @if($places->checkin_end == '18:30') selected @endif>6:30&nbsp;مساءً</option>
                                        <option value="19:00" @if($places->checkin_end == '19:00') selected @endif>7:00&nbsp;مساءً</option>
                                        <option value="19:30" @if($places->checkin_end == '19:30') selected @endif>7:30&nbsp;مساءً</option>
                                        <option value="20:00" @if($places->checkin_end == '20:00') selected @endif>8:00&nbsp;مساءً</option>
                                        <option value="20:30" @if($places->checkin_end == '20:30') selected @endif>8:30&nbsp;مساءً</option>
                                        <option value="21:00" @if($places->checkin_end == '21:00') selected @endif>9:00&nbsp;مساءً</option>
                                        <option value="21:30" @if($places->checkin_end == '21:30') selected @endif>9:30&nbsp;مساءً</option>
                                        <option value="22:00" @if($places->checkin_end == '22:00') selected @endif>10:00&nbsp;مساءً</option>
                                        <option value="22:30" @if($places->checkin_end == '22:30') selected @endif>10:30&nbsp;مساءً</option>
                                        <option value="23:00" @if($places->checkin_end == '23:00') selected @endif>11:00&nbsp;مساءً</option>
                                        <option value="23:30" @if($places->checkin_end == '23:30') selected @endif>11:30&nbsp;مساءً</option>
                                        <option value="00:00" @if($places->checkin_end == '00:00') selected @endif>12:00&nbsp;صباحًا</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="inner_room" class="col-sm-6">عدد الغرف الداخلية</label>
                                    <input type="number" class="form-control" name="inner_room" value="{{$places->inner_room != null ? $places->inner_room : 0 }}" {{$disabled}}>
                                </div>
                                <div class="form-group">
                                    <label for="description">{{Lang::get('esteraha.description')}}</label>
                                    <div class="input-group">
                                      
                                        {!! Form::textarea('description', null,['class'=> 'form-control'  , 'required'=>'required' ,$disabled])!!}
                                    </div>
                                </div>
                                <div class="form-group">
                                   
                                        <input  type="text" placeholder="Type in an address"
                                               name="address"
                                               class="form-control"

                                               value="{{$places->address}} " {{$disabled}}/>
                                    
                                   <input type="hidden" id="geocomplete">
                                     </div>
									<div class="form-group">
                                    <div class="map_canvas" style="margin: 0px 0px 0px 0px !important;width: 100%;"></div>
									</div>
                            




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
                                        {!! Form::text('lat', null,['class'=> 'form-control'  , 'required'=>'required',$disabled])!!}
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{Lang::get('esteraha.longitude')}}</label>
                                        {!! Form::text('lng', null,['class'=> 'form-control'  , 'required'=>'required',$disabled])!!}
                                    </div>
                                </div>

                            </div>


                                        </div>

                        </div>



                        <div class="col-sm-6 ol-md-6 col-xs-12">
                            <div class="white-box">

                                <div class="form-group">
                                    <label>{{Lang::get('esteraha.type')}}</label>

                                    <select class="form-control" name="type_id" {{$disabled}}>
                                        @foreach ($types as $type)
                                            <option value="{{$type->id}}" @if($places->type_id == $type->id) selected @endif>{{$type->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                    <div class="form-group">
                                        <label for="stars" class="col-sm-6">المكان ذو</label>
                                        <select class="form-control" id="stars" name="stars" {{$disabled}}>
                                            <option value="5" @if($places->stars == '5') selected @endif>خمس نجوم</option>
                                            <option value="4" @if($places->stars == '4') selected @endif>اربع نجوم</option>
                                            <option value="3" @if($places->stars == '3') selected @endif>ثلاث نجوم</option>
                                            <option value="2" @if($places->stars == '2') selected @endif>اثنان نجوم</option>
                                            <option value="1" @if($places->stars == '1') selected @endif>نجمة واحدة</option>
                                        </select>
                                    </div>

                                <div class="form-group">
                                    <label>{{Lang::get('esteraha.segment')}}</label>

                                    <select class="form-control" name="gender" {{$disabled}}>

                                        <option value="m"  @if($places->gender == 'm') selected @endif>{{Lang::get('esteraha.male')}}</option>
                                        <option value="f" @if($places->gender == 'f') selected @endif>{{Lang::get('esteraha.female')}}</option>
                                        <option value="b" @if($places->gender == 'b') selected @endif>{{Lang::get('esteraha.both')}}</option>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="sleep_room" class="col-sm-6">غرف نوم</label>
                                    <select class="form-control" id="sleep_room" name="sleep_room" {{$disabled}}>
                                        <option value="yes" @if($places->sleep_room == 1) selected @endif>يوجد</option>
                                        <option value="no" @if($places->sleep_room == 0) selected @endif>لا يوجد</option>
                                    </select>
                                </div>


                                <div id="bedType"  @if ($places->sleep_room == 0) style="display: none" @endif>

                                    <label for="type_bed" class="col-sm-6">نوع السرير</label>

                                    <div id="bedsTypes">
                                        <?php $doubleRooms = $places->double_rooms_count; $singleRooms = $places->single_rooms_count; ?>

                                        @if($doubleRooms ==0 && $singleRooms == 0)
                                                <div id="cloneAddBed" class="form-group">
                                                    <select class="form-control" id="type_bed" name="type_bed[]" {{$disabled}}>
                                                        <option value="two" selected>مزدوج</option>
                                                        <option value="one">فردي</option>
                                                    </select>
                                                </div>
                                            @endif
                                    @while($doubleRooms	!= 0)
                                        <div id="cloneAddBed" class="form-group">
                                            <select class="form-control" id="type_bed" name="type_bed[]" {{$disabled}}>
                                                <option value="two" selected>مزدوج</option>
                                                <option value="one">فردي</option>
                                            </select>
                                        </div>
                                        <?php $doubleRooms -- ; ?>
                                        @endwhile

                                            @while($singleRooms	!= 0)
                                                <div id="cloneAddBed" class="form-group">
                                                    <select class="form-control" id="type_bed" name="type_bed[]" {{$disabled}}>
                                                        <option value="two" >مزدوج</option>
                                                        <option value="one" selected>فردي</option>
                                                    </select>
                                                </div>
                                                <?php $singleRooms -- ; ?>
                                            @endwhile

                                    </div>
                                    <div class="form-group">
                                        <input type="button" value="اضافة سرير" class="addBed btn btn-add" {{$disabled}}>
                                    </div>
                                </div>
                         


</div>
                            </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h3 class="box-title">المرافق</h3>
                                <hr class="m-t-0 m-b-20">
                                 <div class="checkbox checkbox-primary p-t-0">

                            <?php $placesAmenities = $places->amenities->pluck('id')->toArray();?>


                                    @foreach ($amenities as $amenity)
                                        <div class="col-md-3">

                                            <input id="{{$amenity->id}}" type="checkbox" name="amenity_id[]" @if(in_array($amenity->id,$placesAmenities) == true) checked @endif value="{{$amenity->id}}" {{$disabled}}>
                                            <label for="{{$amenity->id}}">{{$amenity->name}}</label>
                                        </div>
                                    @endforeach

                                </div>

                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">{{Lang::get('esteraha.price')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">SAR/ الليلة</div>
                                        {!! Form::text('price', null,['class'=> 'form-control' , 'required'=>'required',$disabled])!!}
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 ol-md-12 col-xs-12"></div>

                            @if($place_pictures->isEmpty())
                                <div class="col-sm-6 ol-md-6 col-xs-12">
                                    <div class="alert alert-warning" role="alert">{{Lang::get('messages.placeEmptyImages')}} </div>

                                </div>
                            @endif
                                @foreach ($place_pictures as $place_pictures)
                                    <div class="col-sm-2 ol-md-6 col-xs-12">

                                        <div class="form-group">
                                        <?php
                                        $path=  asset('images/Places').'/'. $place_pictures->name;

                                        ?>
                                        <a class="example-image-link small-img" href="{!! $path !!}" data-lightbox="example-set"><img class="example-image small-img" src="{!! $path !!}"  /></a>
                                            @if($disabled == '' )
                                            <button place_id="{{$places->id}}" image="{{$place_pictures->name}}" type="button" class="btn btn-danger btn-sm deleteImage" >
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <span>إزاله</span>
                                            </button>
                                                @endif
                                    </div>
                                    </div>
                                @endforeach

                            @if($disabled == '' )
                            <div class="col-md-12">
                                <label for="drop-zone" class="col-sm-6">صور مكان الاقامة</label>
                                <div id="drop-zone" action="#" class="dropzone ">

                                </div>
                                <div class="step-4-errorMessages">

                                </div>
                                <br>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" style="float: right;" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

                            </div>
                                @endif
                        </div>


                        </div>
                        {!! Form::Close()!!}

                    </div>
                </div>
            </div>

    </div>





@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDy3BphIhjTBffDKhLMG3MBiWep7jZfIfs"></script>
    <script src="/jquery.geocomplete.js"></script>
    @include('geocompleteInitScript',['geoLat' => $places->lat , 'geoLng' => $places->lng])
    <script>



        $(function(){

            $('select[name=sleep_room]').on('change',function(){
                if ($(this).val() == 'no')
                {
                    $('#bedType').hide();
                }
                else
                {
                    $('#bedType').show();
                }
            });

            $('.addBed').on('click',function(){
                var cloned = $('#cloneAddBed').clone();
                $('#bedsTypes').append(cloned);
            });

            $('.deleteImage').on('click',function(){

                var data = {
                    'place_id' :  $(this).attr('place_id'),
                    'image' : $(this).attr('image')
                }
                currentObj = $(this);
                $.ajax({
                    'url' : '{{route('delete.place.image')}}',
                    'method' : 'POST',
                    'data' : data,
                    success: function(response){

                        $('.step-4-errorMessages').html('');

                         if(typeof response.success != 'undefined')
                         {
                             currentObj.parent().parent().remove();
                             var html = '<div class="alert alert-success" role="alert">'+response.success+'</div>'
                             $('.step-4-errorMessages').append(html);
                         }
                         else
                         {
                             currentObj.parent().parent().remove();
                             var html = '<div class="alert alert-danger" role="alert">'+response.errors+'</div>'
                             $('.step-4-errorMessages').append(html);
                         }

                    }
                });



            });

        });
    </script>
    @include('place.dropZoneScript')
@stop
@stop