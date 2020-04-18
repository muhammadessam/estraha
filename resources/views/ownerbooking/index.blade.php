@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.reservationcontrol')}}</li>
            </ol>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('content')
    @include('flash::message')

    <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">{{Lang::get('esteraha.reservationcontrol')}}</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-1">
                    <h3 class="box-title m-b-0"></h3>
                        </div>
                    <div class="col-md-offset-11">
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{Lang::get('esteraha.placename')}}</th>
                                <th>{{Lang::get('esteraha.clientname')}}</th>
                                <th>{{Lang::get('esteraha.phoneNumber')}}</th>
                                <th>{{Lang::get('esteraha.email')}}</th>
                                <th>{{Lang::get('esteraha.price')}}</th>
                                <th>{{Lang::get('esteraha.city')}}</th>
                                <th>{{Lang::get('esteraha.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($bookings as $booking)

                            <tr>
                                <td>{{$booking->placename}}</td>
                                <td>{{$booking->username}}</td>
                                <td>{{$booking->bookphonenumber}}</td>
                                <td>{{$booking->bookemail}}</td>
                                <td>{{$booking->bookprice}}</td>
                                <td>{{$booking->bookcity}}</td>

                                <td>
                                    <a  href="{{URL::to('ownerbookings/' .$booking->bookingid)}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.show')}}"><i class="ti-eye text-inverse m-r-10"></i></a>

                                </td>

                            </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
@stop