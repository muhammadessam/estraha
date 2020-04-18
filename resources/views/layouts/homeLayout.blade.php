<!DOCTYPE html>

<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">

    <title>Esteraha - Admin Panel</title>

    <!-- Bootstrap Core CSS -->





    <link href="{{ asset('plugins/bower_components/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Menu CSS -->

    <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('plugins/bower_components/dropify/dist/css/dropify.min.css') }}">

    <link href="{{ asset('plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">

    <!-- Color picker plugins css -->

    <link href="{{ asset('plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css') }}" rel="stylesheet">

    <!-- Date picker plugins css -->

    <link href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Daterange picker plugins css -->

    <link href="{{ asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- animation CSS -->

    <link href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/bower_components/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">



    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- color CSS you can use different color css from css/colors folder -->

    <link href="{{ asset('css/colors/blue.css') }}" id="theme"  rel="stylesheet">

    <link href="{{ asset('css/overridePanelsColors.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



    <![endif]-->



    <style type="text/css">

        @import    url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        html,body,button,input{

            font-family: 'Droid Arabic Kufi', serif !important;

        }

        #map {

            height: 100%;

        }

        /* Optional: Makes the sample page fill the window. */

        html, body {

            height: 100%;

            margin: 0;

            padding: 0;

        }

        #floating-panel {

            position: absolute;

            top: 10px;

            left: 25%;

            z-index: 5;

            background-color: #fff;

            padding: 5px;

            border: 1px solid #999;

            text-align: center;

            font-family: 'Roboto','sans-serif';

            line-height: 30px;

            padding-left: 10px;





        }







    </style>



</head>





<body class="fix-sidebar">

<!-- Preloader -->



@include('layouts.header')





@if(Auth::user()->hasRole('admin')  )



    @include('layouts.sidebar')



@endif





@if(Auth::user()->hasRole('supplier')  )



    @include('layouts.ownersidebar')



@endif







<div class="preloader">

    <div class="cssload-speeding-wheel"></div>

</div>

<div id="wrapper">

    <!-- Page Content -->

    <div id="page-wrapper">

        <div class="container-fluid">

            @yield('breadcrumb')



            @yield('content')

        </div>

        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->

</div>

<footer class="footer text-center" style="position:relative"> Copyright © 2017 Elegant Tech Solutions. All Rights Reserved. </footer>







<!-- /#wrapper -->

<!-- jQuery -->





<!-- Bootstrap Core JavaScript -->

<script src="{{ asset('plugins/bower_components/bootstrap-rtl-master/dist/js/bootstrap-rtl.min.js') }}"></script>

<!-- Menu Plugin JavaScript -->

<script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<!--slimscroll JavaScript -->

<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('js/waves.js') }}"></script>

<!-- Custom Theme JavaScript -->

<script src="{{ asset('js/custom.min.js') }}"></script>



<!--Style Switcher -->

<script src="{{ asset('plugins/bower_components/moment/moment.js') }}"></script>

<script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>

<script src="{{ asset('js/jasny-bootstrap.js') }}"></script>

<script src="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.js') }}"></script>

<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

<script src="{{ asset('plugins/bower_components/dropify/dist/js/dropify.min.js') }}"></script>



<script>

    $(document).ready(function(){

        // Basic

        $('.dropify').dropify();



        // Translated

        $('.dropify-fr').dropify({

            messages: {

                default: 'Glissez-déposez un fichier ici ou cliquez',

                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',

                remove:  'Supprimer',

                error:   'Désolé, le fichier trop volumineux'

            }

        });



        // Used events

        var drEvent = $('#input-file-events').dropify();



        drEvent.on('dropify.beforeClear', function(event, element){

            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");

        });



        drEvent.on('dropify.afterClear', function(event, element){

            alert('File deleted');

        });



        drEvent.on('dropify.errors', function(event, element){

            console.log('Has Errors');

        });



        var drDestroy = $('#input-file-to-destroy').dropify();

        drDestroy = drDestroy.data('dropify')

        $('#toggleDropify').on('click', function(e){

            e.preventDefault();

            if (drDestroy.isDropified()) {

                drDestroy.destroy();

            } else {

                drDestroy.init();

            }

        })

    });

</script>





<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>

<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>



<script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>



<!-- Color Picker Plugin JavaScript -->

<script src="{{ asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>

<script src="{{ asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>

<script src="{{ asset('plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>





<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<!-- Date range Plugin JavaScript -->

<script src="{{ asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>







<!-- Clock Plugin JavaScript -->



<script>

    $(document).ready(function(){

        $('#myTable').DataTable({"language":

            {

                "sProcessing": "جارٍ التحميل...",

                "sLengthMenu": "أظهر _MENU_ مدخلات",

                "sZeroRecords": "لم يعثر على أية سجلات",

                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",

                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",

                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",

                "sInfoPostFix": "",

                "sSearch": "ابحث:",

                "sUrl": "",

                "oPaginate": {

                    "sFirst": "الأول",

                    "sPrevious": "السابق",

                    "sNext": "التالي",

                    "sLast": "الأخير"

                }

            },



            "order": [[ 2, 'asc' ]],

            dom: 'Bfrtip',

            buttons: [

                'copy', 'csv', 'excel', 'pdf', 'print'

            ],

            "displayLength": 10

        });





        // Order by the grouping

        $('#myTable tbody').on( 'click', 'tr.group', function () {

            var currentOrder = table.order()[0];

            if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {

                table.order( [ 2, 'desc' ] ).draw();

            }

            else {

                table.order( [ 2, 'asc' ] ).draw();

            }

        } );



    });



</script>



<script>

    // Clock pickers

    $('#single-input').clockpicker({

        placement: 'bottom',

        align: 'left',

        autoclose: true,

        'default': 'now'



    });



    $('.clockpicker').clockpicker({

        donetext: 'Done',



    })

        .find('input').change(function(){

        console.log(this.value);

    });



    $('#check-minutes').click(function(e){

        // Have to stop propagation here

        e.stopPropagation();

        input.clockpicker('show')

            .clockpicker('toggleView', 'minutes');

    });

    if (/mobile/i.test(navigator.userAgent)) {

        $('input').prop('readOnly');

    }

    // Colorpicker



    $(".colorpicker").asColorPicker();

    $(".complex-colorpicker").asColorPicker({

        mode: 'complex'

    });

    $(".gradient-colorpicker").asColorPicker({

        mode: 'gradient'

    });

    // Date Picker

    $('.mydatepicker, #datepicker').datepicker(

        {format: "dd-mm-yyyy", autoclose: true, todayHighlight: true}

    );



</script>





<script>

    $("a#delete").click(function(){

        return confirm("Do you want to delete this record?");

    });

</script>







@yield('scripts')





</body>



</html>



