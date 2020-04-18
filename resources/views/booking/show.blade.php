@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li><a href="{{URL::to('bookings')}}">{{Lang::get('esteraha.reservationcontrol')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.bookdetails')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

@section('content')


    <div class="row">



        <div class="col-md-12">

            <div class="panel panel-info">
                <div class="panel-heading">{{Lang::get('esteraha.bookdetails')}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">


                        <div class="col-sm-6 ol-md-6 col-xs-12">
                            <div class="white-box">

                                <h3 class="box-title">{{Lang::get('esteraha.placedetails')}}</h3>
                                <hr class="m-t-0 m-b-40">

                                <div class="form-group">
                                    <label for="name">{{Lang::get('esteraha.placename')}}</label>
                                    
                                     
                                        <label class="form-control"> {!! $bookings->place_name !!}</label>
                                 
                                </div>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{Lang::get('esteraha.segment')}}</label>
                                           
                                               

                                                <label  class="form-control">
                                                        @if($bookings->gender == 'm')
                                                            {{Lang::get('esteraha.male')}}

                                                        @elseif($bookings->gender == 'f')
                                                            {{Lang::get('esteraha.female')}}

                                                        @elseif($bookings->gender == 'b')
                                                            {{Lang::get('esteraha.both')}}
                                                        @endif
                                                </label>
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{Lang::get('esteraha.type')}}</label>
                                          
                                                

                                                <label  class="form-control">
                                                       {{$bookings->typename}}
                                                </label>
                                          
                                        </div>
                                    </div>


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>{{Lang::get('esteraha.owner')}}</label>
                                           
                                             

                                                <label  class="form-control">
                                                       {{$bookings->username}}

                                                </label>
                                       
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price_offer">{{Lang::get('esteraha.address')}}</label>
                                  
                                        
                                        <label  class="form-control">
                                        <a href="http://maps.google.com/?q={{$bookings->lat}},{{$bookings->lng}}" target="_blank">

                                            <?php
                                            $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.urlencode("$bookings->lat,$bookings->lng ").'&sensor=false');
                                            $output= json_decode($geocode);
                                            if($output->status == 'OK') {
                                                echo  $output->results[0]->formatted_address;
                                            }
                                            ?>

                                        </a>
                                        </label>
                                    </div>
                               

                            </div>
                        </div>



                        <div class="col-sm-6 ol-md-6 col-xs-12">
                            <div class="white-box">

                                <h3 class="box-title">{{Lang::get('esteraha.bookdetails')}}</h3>
                                <hr class="m-t-0 m-b-40">

                                <div class="row">
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">{{Lang::get('esteraha.price')}}</label>
                                  <div class="input-group">
                                  <div class="input-group-addon">SAR/ الليلة</div>
                                        
                                        <label  class="form-control"> {!! $bookings->bookprice !!}</label>
                                </div>
                                </div>
                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">{{Lang::get('esteraha.paymentway')}}</label>
                                    
                                      
                                        <label  class="form-control"> {!! $bookings->payment_method !!}</label>
                                    
                                </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">{{Lang::get('esteraha.checkin')}}</label>
                                           
                                                
                                                <label  class="form-control"> {!! $bookings->check_in !!}</label>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">{{Lang::get('esteraha.checkout')}}</label>
                                           
                                                
                                                <label  class="form-control"> {!! $bookings->check_out !!}</label>
                                      
                                        </div>
                                    </div>
                                </div>


                                <h3 class="box-title">{{Lang::get('esteraha.clientdetails')}}</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">{{Lang::get('esteraha.clientname')}}</label>
                                         
                                               
                                                <label  class="form-control"> {!! $bookings->bookname !!}</label>
                                       
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">{{Lang::get('esteraha.email')}}</label>
                                          
                                               
                                                <label  class="form-control"> {!! $bookings->bookemail !!}</label>
                                          
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">{{Lang::get('esteraha.phone')}}</label>
                                         
                                             
                                                <label  class="form-control"> {!! $bookings->bookphonenumber !!}</label>
                                         
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">{{Lang::get('esteraha.address')}}</label>
                                           
                                                
                                                <label  class="form-control"> {!! $bookings->bookcity !!}</label>
                                         
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@stop