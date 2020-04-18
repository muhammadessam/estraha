@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>
                <li class="active" >{{Lang::get('esteraha.ownerscontrol')}}</li>
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
                        {{Lang::get('esteraha.ownerscontrol')}}
                        <a href="{{URL::to('owners/create')}}"  type="button" class="btn btn-default btn-circle"  title="{{Lang::get('esteraha.add')}}" style="background:none; color:dodgerblue; border: none; float: left; color: white" ><i class="fa fa-plus fa-lg" style="font-size: 21px;"></i></a>

                    </div>
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
                                <th>{{Lang::get('esteraha.userName')}}</th>
                                <th>{{Lang::get('esteraha.email')}}</th>
                                <th>{{Lang::get('esteraha.phoneNumber')}}</th>
                                <th>{{Lang::get('esteraha.gender')}}</th>
                                <th>{{Lang::get('esteraha.birthdate')}}</th>
                                <th>{{Lang::get('esteraha.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($owners as $owner)

                            <tr>
                                <td>{{$owner->name}}</td>
                                <td>{{$owner->email}}</td>
                                <td>{{$owner->phone_number}}</td>
                                <td>
                                    @if($owner->gender == 'm')
                                        {{Lang::get('esteraha.m')}}

                                    @elseif($owner->gender == 'f')
                                        {{Lang::get('esteraha.f')}}

                                    @endif
                                </td>
                                <td>{{$owner->birth_date}}</td>
                                <td>
                                    <a  href="{{URL::to('owners/' .$owner->id. '/edit'  )}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.edit')}}"><i class="ti-pencil text-inverse m-r-10"></i></a>

                                    <a  id="delete" href="{{URL::to('owners/destroy/' .$owner->id)}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.delete')}}"><i class="ti-close text-danger"></i></a>

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