@extends('layouts.layout')

@section('breadcrumb')

    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{Lang::get('esteraha.notificationscontrol')}}</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
@section('content')
    @include('flash::message')

    <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-1">
                    <h3 class="box-title m-b-0"></h3>
                        </div>
                    <div class="col-md-offset-11">
                    <a href="{{URL::to('notifications/create')}}"  type="button" class="btn btn-default btn-circle btn-lg"  title="{{Lang::get('esteraha.add')}}" style="background:#03a9f3; color: #ffffff"><i class="ti-plus"></i></a>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{Lang::get('esteraha.title')}}</th>
                                <th>{{Lang::get('esteraha.text')}}</th>
                                <th>{{Lang::get('esteraha.actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($notifications as $notification)

                            <tr>
                                <td>{{$notification->title}}</td>
                                <td>{{$notification->text}}</td>

                                <td>
                                    <a id="delete"  href="{{URL::to('notifications/destroy/' .$notification->id)}}" data-toggle="tooltip"  data-original-title="{{Lang::get('esteraha.delete')}}"><i class="ti-close text-danger"></i></a>

                                </td>
                            </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@stop