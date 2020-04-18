<!DOCTYPE html>

<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">

    <title>استراحة</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{ asset('plugins/bower_components/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">

    <!-- animation CSS -->

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- color CSS -->

    <link href="{{ asset('css/colors/blue.css') }}" id="theme"  rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



    <![endif]-->



    <style type="text/css">



        @import    url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        body{

            font-family: 'Droid Arabic Kufi', serif !important;

        }



        .login-register{

            background:url({{ asset('plugins/images/login-register.jpg') }}) no-repeat center center / cover !important;

            height:100%;

            position:fixed;

        }

    </style>

</head>

<body>

<!-- Preloader -->

<div class="preloader">

    <div class="cssload-speeding-wheel"></div>

</div>

<section id="wrapper" class="login-register">

    <div class="login-box">

        <div class="white-box">



                {!! Form::open(['route' => 'login' , 'class' => 'form-horizontal', 'files'=>true]) !!}



                <label class="box-title m-b-20">{{Lang::get('esteraha.signin')}}</label>

                <div class="form-group ">

                    <div class="col-xs-12">



                        {!! Form::email('email', null,['class'=> 'form-control' , 'placeholder'=>'البريد الالكتروني' , 'required'=>'required'])!!}



                    </div>

                </div>

                <div class="form-group">

                    <div class="col-xs-12">

                        {!! Form::password('password',['class'=> 'form-control' , 'placeholder'=>'كلمة المرور' , 'required'=>'required'])!!}

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-md-12">

                        <div class="checkbox checkbox-primary pull-left p-t-0">

                            <input id="checkbox-signup" type="checkbox">

                            <label for="checkbox-signup">{{Lang::get('esteraha.rememberme')}}</label>

                        </div>

                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>{{Lang::get('esteraha.forgetpassword')}}</a> </div>

                </div>

                <div class="form-group text-center m-t-20">

                    <div class="col-xs-12">

                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{Lang::get('esteraha.login')}}</button>

                    </div>

                </div>



                <div class="form-group m-b-0">

                    <div class="col-sm-12 text-center">

                        <p>{{Lang::get('esteraha.donothaveanaccount')}}<a href="{{route('registration.intro')}}" class="text-primary m-l-5"><b>{{Lang::get('esteraha.signup')}}</b></a></p>

                    </div>

                </div>

            {!! Form::close() !!}







                {!! Form::open(['route' => 'password.email' , 'class' => 'form-horizontal form-material','id' => 'recoverform']) !!}



                <div class="form-group ">

                    <div class="col-xs-12">

                        <h3>{{Lang::get('esteraha.recoverpassword')}}</h3>

                        <p class="text-muted">{{Lang::get('esteraha.alinkwillbesentforyouremail')}}</p>

                    </div>

                </div>

                <div class="form-group ">

                    <div class="col-xs-12">

                        {!! Form::email('email', null,['class'=> 'form-control' , 'placeholder'=>'البريد الالكتروني' , 'required'=>'required'])!!}

                    </div>

                </div>

                <div class="form-group text-center m-t-20">

                    <div class="col-xs-12">

                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{Lang::get('esteraha.reset')}}</button>

                    </div>

                </div>

            {!! Form::close() !!}



        </div>

    </div>

</section>

<!-- jQuery -->

<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->

<script src="{{ asset('plugins/bower_components/bootstrap-rtl-master/dist/js/bootstrap-rtl.min.js') }}"></script>

<!-- Menu Plugin JavaScript -->

<script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>



<script src="{{ asset('js/jasny-bootstrap.js') }}"></script>



<!--slimscroll JavaScript -->

<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

<!--Wave Effects -->

<script src="{{ asset('js/waves.js') }}"></script>

<!-- Custom Theme JavaScript -->

<script src="{{ asset('js/custom.min.js') }}"></script>

<!--Style Switcher -->

<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

</body>

</html>

