@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.placescontrol')}}</li>
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
                    <div class="panel-heading">
                        @if(Auth::user()->role->code != "admin")
                        {{Lang::get('esteraha.placescontrol')}}
                        <a href="{{URL::to('places/create')}}"  type="button" class="btn btn-default btn-circle"  title="{{Lang::get('esteraha.add')}}" style="background:none; color:dodgerblue; border: none; float: left; color: white" ><i class="fa fa-plus fa-lg"></i></a>
                        @endif
                    </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-1">
                            {{--<a href="{{URL::to('places/create')}}"  type="button" class="btn btn-default btn-circle btn-lg"  title="{{Lang::get('esteraha.add')}}" style="background:none; color:dodgerblue; border: none" ><i class="fa fa-plus-circle fa-2x"></i></a>--}}
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
                                <th width="150px">{{Lang::get('esteraha.address')}}</th>
                                <th>{{Lang::get('esteraha.price')}}</th>
                                <th>{{Lang::get('esteraha.segment')}}</th>
                                <th>{{Lang::get('esteraha.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($places as $place)
                            <tr>
                                <td>{{$place->place_name}}</td>
                                <td width="150px">
                                    <a href="http://maps.google.com/?q={{$place->lat}},{{$place->lng}}" target="_blank">
                                        <?php
                                        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.urlencode("$place->lat,$place->lng").'&sensor=false');
                                        $output= json_decode($geocode);
                                        if($output->status == 'OK') {
                                            echo  $output->results[0]->formatted_address;
                                        }
                                        ?>
                                    </a>
                                </td>
                                <td>{{$place->price}}</td>
                                <td>
                                    @if($place->gender == 'm')
                                    {{Lang::get('esteraha.male')}}
                                    @elseif($place->gender == 'f')
                                        {{Lang::get('esteraha.female')}}
                                    @elseif($place->gender == 'b')
                                        {{Lang::get('esteraha.both')}}
                                    @endif
                                </td>

                                <td>
                                    <a  href="{{URL::to('places/' .$place->id. '/edit'  )}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.edit')}}"><i class="ti-pencil text-inverse m-r-10"></i></a>

                                    <a   id="delete" href="{{URL::to('places/destroy/' .$place->id)}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.delete')}}"><i class="ti-close text-danger"></i></a>

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