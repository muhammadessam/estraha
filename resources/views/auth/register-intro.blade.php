<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Esteraha</title>



    <!-- Bootstrap -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <style type="text/css">

        body{

            background: #fff;

            font-family: sans-serif

        }

        h1,h2,h3,h4,h5,h6{

            font-family: sans-serif

        }

        .navbar-brand img{

            width: 150px;

        }

        .vh_holder{

            background: url(images/bghome.jpg);

            background-size: cover;

            padding: 120px 0 60px 0;

            height: 100vh

        }

        .navbar-inverse{

            background: transparent;

            border-color: transparent;

            color: #fff;

            font-size: 13px;

            margin: 0 !important;

            border-radius: 0 !important;

        }

        .panel-login {

            border-color: #537BB4;

            -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);

            -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);

            box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);

            background: #537BB4;

            color:#fff;

        }

        .panel-login h2{

            color:#fff;

            font-size:15px;

        }

        .panel-login>.panel-heading {

            color: #fff;

            background-color: #57C9E8;

            border-color: #57C9E8;

            text-align:center;

            padding: 0;

            border-width: 0;

            height: 50px;

        }

        .panel-login>.panel-heading a{

            text-decoration: none;

            color: #fff;

            font-weight: normal;

            font-size: 14px;

            -webkit-transition: all 0.1s linear;

            -moz-transition: all 0.1s linear;

            transition: all 0.1s linear;

            padding: 15px;

            display: block;

            width: 50%;

            float: right;

        }

        .panel-login>.panel-heading a.active{

            color: #fff;

            font-size: 14px;

            background: #537BB4;

        }

        .page_prog .list-group-item:hover{

            background: transparent;

        }

        .page_prog .list-group-item.prev:before{

            content: "\E013" !important;

            color: #5CB85C;

            font-family: 'Glyphicons Halflings';

            -webkit-font-smoothing: antialiased;

            font-style: normal;

            font-weight: normal;

            line-height: 1;

            font-size: 24px;

        }

        .panel-login>.panel-heading hr{

            margin-top: 10px;

            margin-bottom: 0px;

            clear: both;

            border: 0;

            height: 1px;

            background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));

            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));

            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));

            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));

            display: none;

        }

        .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {

            height: 45px;

            border: 1px solid #ddd;

            font-size: 16px;

            -webkit-transition: all 0.1s linear;

            -moz-transition: all 0.1s linear;

            transition: all 0.1s linear;

        }

        .panel-login input:hover,

        .panel-login input:focus {

            outline:none;

            -webkit-box-shadow: none;

            -moz-box-shadow: none;

            box-shadow: none;

            border-color: #ccc;

        }

        .btn-login {

            background-color: #59B2E0;

            outline: none;

            color: #fff;

            font-size: 14px;

            height: auto;

            font-weight: normal;

            padding: 14px 0;

            text-transform: uppercase;

            border-color: #59B2E6;

        }

        .btn-login:hover,

        .btn-login:focus {

            color: #fff;

            background-color: #53A3CD;

            border-color: #53A3CD;

        }

        .forgot-password {

            text-decoration: underline;

            color: #888;

        }

        .forgot-password:hover,

        .forgot-password:focus {

            text-decoration: underline;

            color: #666;

        }



        .btn-register {

            background-color: #1CB94E;

            outline: none;

            color: #fff;

            font-size: 14px;

            height: auto;

            font-weight: normal;

            padding: 14px 0;

            text-transform: uppercase;

            border-color: #1CB94A;

        }

        .btn-register:hover,

        .btn-register:focus {

            color: #fff;

            background-color: #1CA347;

            border-color: #1CA347;

        }

        .square{



            margin: 40px 0;



            text-align: center;

        }

        .square h2{

            margin-bottom: 40px;

            color: #3eb7e4



        }

        .square h3{

            margin: 10px 0;

            text-align:;

            font-size: 21px;

            min-height: 50px;

            color: #95989a;



        }

        .square p{

            font-size: 13px;

            color: #95989a;



        }

        .square_two{



            margin: 40px 0;



            text-align: center;



            background: #f1f1f1;



            padding: 50px;

        }

        .square_two h2{

            margin-bottom: 40px;

            font-size: 18px;

            font-weight: bold;

            color: #3eb7e4

        }

        .square_two h3{

            margin: 10px 0;

            font-size: 15px;

            color: #95989a;

        }

        .square_two p{

            font-size: 11px;

            color: #95989a;

        }

        .icon_box{

            text-align: center;

            font-size: 17px;

        }

        .icon_box img{

            font-size: 60px;

            display: block;

            margin: 15px auto;

        }

        .prog{



            margin-top: 7px;

        }

        .prog .progress{

            margin-bottom:7px;

            margin-top: 0 !important;

        }

        .prog p{

            margin: 0;

            font-size: 12px;

        }

        .page_prog{

            padding: 0 0;

            background: #57C9E8;

        }

        .page_prog .menu-right{

            padding: 0;

            background: #57C9E8;

            position: relative;

            bottom: 0;

        }

        .page_prog .left_section{

            background:#f1f1f1;

            padding-top: 51px;

            padding-right: 50px;

            padding-left: 50px;

            padding-bottom: 50px;

        }

        .page_prog .list-group-item{

            background: transparent;

            color: #fff;

            border-radius: 0 !important;

            padding: 15px 40px;

            border-color: rgba(0,0,0,0.1);

            border-width: 0 0 1px 0;

        }

        .page_prog .list-group-item.disabled{

            color:rgba(255, 255, 255, 0.55)

        }

        .page_prog .list-group-item.disabled:hover{

            background:transparent;

            color:rgba(255, 255, 255, 0.55)

        }

        .page_prog .list-group-item.active{

            background:#f1f1f1;

            color:#000

        }

        .page_prog .list-group-item.disabled:focus{

            background: #57C9E8;

        }

        .map_canvas {float: none;height: 500px;width: 100%;padding: 30px 0;}

        form {width:;float: none;}

        fieldset {width:;margin-top: 20px;}

        fieldset label { display: block; margin: 0.5em 0 0em; }

        fieldset input { width: 95%; }

        .places{

            background: #fff;

            padding: 30px;

            margin-top: 15px;

            border-radius: 10px;

        }

        .btn{

            border-radius: 15px;

            border-width: 0;

        }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/mixarab.css') }}" />



</head>



<body>

<!-- بداية الناف بار -->

<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="#"><img src="images/booking_logo_retina.png" class="img-responsive"></a>

        </div>

        <div class="collapse navbar-collapse" id="navbar">

            <div class="navbar-form navbar-left">





                <span>هل انت مشترك معنا حاليا ؟</span>

                <button type="button" class="btn btn-info">سجل دخول</button>



            </div>

        </div>

        <!--/.nav-collapse -->

    </div>

</nav>

<!-- بداية الخلفية والنموذج الاولي -->

<div class="vh_holder">

    <div class="container">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-8">

                <div class="join">

                    <h1>انضم الي booking.com</h1>

                    <h5>ضيوفك بالانتظار</h5>

                    <a class="btn btn-info btn-lg btn-block" href="{{route('register')}}">ادراج مكان جديد</a>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- section square -->

<section class="square">

    <div class="container">

        <h2>لماذ عليك أن تختارنا</h2>

        <div class="row">

            <div class="col-sm-4">

                <h3>لغات متعددة ومساعدة على مدار 24 ساعة</h3>

                <p>فريق الدعم المحلي الخاص بنا والعامل على مدار الساعة يتوفر لخدمتك وخدمة ضيوفك - بـ40 لغة.</p>

            </div>

            <div class="col-sm-4">

                <h3>تسجيل مجاني</h3>

                <p>ليس هناك أية رسوم على التسجيل أو تكاليف اشتراك اطلاقًا عندما ترغب في أن تصبح شريكًا معنا.</p>

            </div>

            <div class="col-sm-4">

                <h3>حضور عالمي واسع</h3>

                <p>نقوم بالتسويق لمكان الإقامة الخاص بك لعدد كبير من المسافرين من أنحاء العالم كافة وعلى مدار السنة.</p>

            </div>

        </div>

    </div>

</section>

<!-- /.container -->

<hr>

<!-- section square -->



<!-- /.container -->



<section class="square">

    <div class="container">

        <h2>Booking.com للبيوت والشقق</h2>

        <h6>سواء كان لديك منزل ريفي أو شقة في المدينة أو فيلا على الشاطئ، Booking.com هو الموقع المثالي لإضافة مكان الإقامة الخاص بك.</h6>

        <div class="row">

            <div class="col-sm-3">

                <div class="icon_box">

                    <img src="images/villa-icon.png">

                    شقق فاخرة

                </div>

            </div>

            <div class="col-sm-3">

                <div class="icon_box">

                    <img src="images/villa-icon.png">

                    شقق فاخرة

                </div>

            </div>

            <div class="col-sm-3">

                <div class="icon_box">

                    <img src="images/villa-icon.png">

                    شقق فاخرة

                </div>

            </div>

            <div class="col-sm-3">

                <div class="icon_box">

                    <img src="images/villa-icon.png">

                    شقق فاخرة

                </div>

            </div>



        </div>

    </div>

</section>

<hr>

<div class="container">

    <footer>

        <p>© 2016 Company, Inc.</p>

    </footer>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Bootstrap Form Helpers -->



<script>

    $(window).scroll(function() {

        var scroll = $(window).scrollTop();

        //console.log(scroll);

        if (scroll >= 50) {

            //console.log('a');

            $(".navbar-inverse").removeClass("navbar-fixed-top");

        } else {

            //console.log('a');

            $(".navbar-inverse").addClass("navbar-fixed-top");

        }

    });

</script>

</body>



</html>