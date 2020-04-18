@extends('layouts.layout')
@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.specialofferscontrol')}}</li>
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
                    <div class="panel-heading">{{Lang::get('esteraha.specialofferscontrol')}}</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-1">
                    <h3 class="box-title m-b-0"></h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{Lang::get('esteraha.placename')}}</th>
                                <th>{{Lang::get('esteraha.priceoffer')}}</th>
                                <th>{{Lang::get('esteraha.segment')}}</th>
                                <th>{{Lang::get('esteraha.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($places as $place)

                            <tr>
                                <td>{{$place->place_name}}</td>
                                <td>{{$place->price_offer}}</td>

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
                                    <a  href="{{URL::to('specialoffers/' .$place->id. '/edit'  )}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.edit')}}"><i class="ti-pencil text-inverse m-r-10"></i></a>

                                    <a  id="delete" href="{{URL::to('specialoffers/destroy/' .$place->id)}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.delete')}}"><i class="ti-close text-danger"></i></a>

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