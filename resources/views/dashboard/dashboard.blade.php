@extends('layouts.homeLayout')





@section('breadcrumb')



    <div class="row bg-title">

        <div class="col-lg-6 col-md-6 col-sm-1 col-xs-12">

            <ol class="breadcrumb">

                <li><a href="{{URL::to('dashboard')}}">{{Lang::get('esteraha.mainmenu')}}</a></li>

                <li class="active" >{{Lang::get('esteraha.dashboard')}}</li>

            </ol>

        </div>

        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">



        </div>



    </div>

@endsection



@section('content')

    @include('flash::message')

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



    <div class="row">

        <div class="col-md-12">



            <div class="panel panel-info">

                <div class="panel-heading">{{Lang::get('esteraha.dashboard')}}</div>

                <div class="panel-wrapper collapse in" aria-expanded="true" >

                    <div class="panel-body">



                    <div class="white-box">

                   {!! $calendar->generate() !!}

            </div>

        </div>

    </div>

            </div>

        </div>

    </div>



@stop