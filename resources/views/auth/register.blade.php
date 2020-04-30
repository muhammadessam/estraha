<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spinners.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <style type="text/css">
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/gulf.css') }}"/>
</head>


<body>


<!--<h1></h1>

<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>-->

<div class="container">


    {!! Form::open(['route' => 'register' ,'id' => 'regiration_form', 'class' => 'form-horizontal ', 'files'=>true ,'novalidate' => '']) !!}
    <fieldset class="wight">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <h2>تعبئة البيانات</h2>
        <h4>أنت صاحب القرار هنا! نحن بحاجة للأساسيات فقط حتى نساعدك على البدء. بعد أن تتم التوقيع سيكون بإمكانك إجراء
            التغييرات.</h4>

        <div class="stepwizard">
            <div class="stepwizard-row">
                <div class="stepwizard-step active">
                    <button type="button" class="btn active btn-circle">1</button>
                    <p>بيانات عامة</p>
                </div>
                <div class="stepwizard-step">
                    <button type="button" class="btn btn-circle">2</button>
                    <p>تفاصيل المكان</p>
                </div>

                <div class="stepwizard-step">
                    <button type="button" class="btn btn-circle">2</button>
                    <p>رفع الصور</p>
                </div>

                <div class="stepwizard-step">
                    <button type="button" class="btn btn-circle">3</button>
                    <p>الأتفاقيه</p>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="numbers">عدد الاماكن التي تريد اضافتها</label>
            <div class="col-sm-2">
                <input type="number" class="step-1 form-control" id="numbers" name="numbers" value="1" min="1">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="type">نوع المكان</label>
            <div class="col-sm-4">
                <select class="form-control step-1" name="type" id="type">
                    @foreach($types as $type)
                        <option value="{{$type->name}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="userName">الاسم كامل</label>
            <div class="col-sm-8">
                <input type="text" name="userName" id="userName" class="form-control step-1" placeholder="الاسم بالكامل"
                       required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="newpassword">كلمه السر</label>
            <div class="col-sm-8">
                <input type="password" name="newpassword" id="newpassword" class="form-control step-1"
                       placeholder="كلمه السر" required>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 req" for="confirmPass">تأكيد كلمة المرور</label>
            <div class="col-sm-8">
                <input type="password" name="confirmPass" id="confirmPass" class="form-control step-1"
                       placeholder="تأكيد كلمة المرور" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="mobile">رقم الجوال</label>
            <div class="col-sm-8">
                <input type="tel" name="mobile" id="mobile" class="form-control step-1" placeholder="05 111 222 33"
                       maxlength="10">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 req" for="email">الايميل</label>
            <div class="col-sm-8">
                <input type="email" name="email" id="email" class="form-control step-1"
                       placeholder="youremail@site.com">
            </div>
        </div>


        <div class="form-group">
            <label for="geoaddress" class="col-sm-3 req">العنوان</label>
            <div class="col-sm-8">
                <input type="hidden" id="geocomplete">
                <input type="text" placeholder="العنوان" class="form-control step-1" value="" name="geoaddress"/>
                <input name="lat" type="hidden" value="">
                <input name="lng" type="hidden" value="">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-11">
                <div id="map_canvas" class="map_canvas"></div>
            </div>
        </div>

        <div class="step-1-errorMessages">
        </div>


        <input type="button" name="data[password]" class="next btn btn-info" value="متابعة"/>
        <input type="button" name="data[cancel]" class="cancel btn btn-default"
               value="{{Lang::get('esteraha.backButton')}}"/>
    </fieldset>

    <fieldset class="wight">
        <h2>تعبئة البيانات</h2>
        <h4>أنت صاحب القرار هنا! نحن بحاجة للأساسيات فقط حتى نساعدك على البدء. بعد أن تتم التوقيع سيكون بإمكانك إجراء
            التغييرات.</h4>
        <div class="stepwizard">
            <div class="stepwizard-row">
                <div class="stepwizard-step active">
                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>
                    <p>بيانات عامة</p>
                </div>

                <div class="stepwizard-step active">
                    <button type="button" class="btn active btn-circle">2</button>
                    <p>تفاصيل المكان</p>
                </div>

                <div class="stepwizard-step">
                    <button type="button" class="btn btn-circle">2</button>
                    <p>رفع الصور</p>
                </div>

                <div class="stepwizard-step">
                    <button type="button" class="btn btn-circle">3</button>
                    <p>الأتفاقيه</p>
                </div>
            </div>
        </div>

        <p>
            أخبرنا المزيد عن مكان الإقامة الخاص بك. يرغب الضيوف بمعرفة أكبر قدر من المعلومات عن المكان الذي سيقيمون فيه
            قبل أن يحجزوا فيه؛ لذا كلما كانت المعلومات أكثر كلما كان أفضل. أضف إلى ذلك، انه كلما كانت المعلومات المضافة
            هنا أكثر كانت عملية إدراج مكان الإقامة الخاص بك أسرع عبر الإنترنت وبالتالي أن يكون جاهزًا للحجز فيه.
        </p>

        <!-- clone step -->

        <div id="items">
            <input type="hidden" id="itemCounter" name="itemCounter" value="0">
            <div class="item">
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="place_name" class="col-sm-6">الاسم المخصص</label>
                            <div class="col-sm-6">
                                <input name="places[0][place_name]" placeholder="شالية , نسيم الشرق , الملكي ..."
                                       class="form-control step-2" type="text" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="checkin_start" class="col-sm-6">تسجيل الوصول</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="checkin_start" name="places[0][checkin_start]">
                                    <option value="07:00">7:00&nbsp;صباحًا</option>
                                    <option value="07:30">7:30&nbsp;صباحًا</option>
                                    <option value="08:00">8:00&nbsp;صباحًا</option>
                                    <option value="08:30">8:30&nbsp;صباحًا</option>
                                    <option value="09:00">9:00&nbsp;صباحًا</option>
                                    <option value="09:30">9:30&nbsp;صباحًا</option>
                                    <option value="10:00">10:00&nbsp;صباحًا</option>
                                    <option value="10:30">10:30&nbsp;صباحًا</option>
                                    <option value="11:00">11:00&nbsp;صباحًا</option>
                                    <option value="11:30">11:30&nbsp;صباحًا</option>
                                    <option value="12:00">12:00&nbsp;مساءً</option>
                                    <option value="12:30">12:30&nbsp;مساءً</option>
                                    <option value="12:30">12:30&nbsp;مساءً</option>
                                    <option value="13:30">1:30&nbsp;مساءً</option>
                                    <option value="14:00">2:00&nbsp;مساءً</option>
                                    <option value="14:30">2:30&nbsp;مساءً</option>
                                    <option value="15:00">3:00&nbsp;مساءً</option>
                                    <option value="15:30">3:30&nbsp;مساءً</option>
                                    <option value="16:00">4:00&nbsp;مساءً</option>
                                    <option value="16:30">4:30&nbsp;مساءً</option>
                                    <option value="17:00">5:00&nbsp;مساءً</option>
                                    <option value="17:30">5:30&nbsp;مساءً</option>
                                    <option value="18:00">6:00&nbsp;مساءً</option>
                                    <option value="18:30">6:30&nbsp;مساءً</option>
                                    <option value="19:00">7:00&nbsp;مساءً</option>
                                    <option value="19:30">7:30&nbsp;مساءً</option>
                                    <option value="20:00">8:00&nbsp;مساءً</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="checkin_end" class="col-sm-6">تسجيل المغادرة</label>

                            <div class="col-sm-4">

                                <select class="form-control" id="checkin_end" name="places[0][checkin_end]">

                                    <option value="12:00">12:00&nbsp;مساءً</option>

                                    <option value="12:30">12:30&nbsp;مساءً</option>

                                    <option value="13:00">1:00&nbsp;مساءً</option>

                                    <option value="13:30">1:30&nbsp;مساءً</option>

                                    <option value="14:00">2:00&nbsp;مساءً</option>

                                    <option value="14:30">2:30&nbsp;مساءً</option>

                                    <option value="15:00">3:00&nbsp;مساءً</option>

                                    <option value="15:30">3:30&nbsp;مساءً</option>

                                    <option value="16:00">4:00&nbsp;مساءً</option>

                                    <option value="16:30">4:30&nbsp;مساءً</option>

                                    <option value="17:00">5:00&nbsp;مساءً</option>

                                    <option value="17:30">5:30&nbsp;مساءً</option>

                                    <option value="18:00">6:00&nbsp;مساءً</option>

                                    <option value="18:30">6:30&nbsp;مساءً</option>

                                    <option value="19:00">7:00&nbsp;مساءً</option>

                                    <option value="19:30">7:30&nbsp;مساءً</option>

                                    <option value="20:00">8:00&nbsp;مساءً</option>

                                    <option value="20:30">8:30&nbsp;مساءً</option>

                                    <option value="21:00">9:00&nbsp;مساءً</option>

                                    <option value="21:30">9:30&nbsp;مساءً</option>

                                    <option value="22:00">10:00&nbsp;مساءً</option>

                                    <option value="22:30">10:30&nbsp;مساءً</option>

                                    <option value="23:00">11:00&nbsp;مساءً</option>

                                    <option value="23:30">11:30&nbsp;مساءً</option>

                                    <option value="00:00">12:00&nbsp;صباحًا</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="stars" class="col-sm-6">المكان ذو</label>

                            <div class="col-sm-4">

                                <select class="form-control" id="stars" name="places[0][stars]">

                                    <option value="5">خمس نجوم</option>

                                    <option value="4">اربع نجوم</option>

                                    <option value="3">ثلاث نجوم</option>

                                    <option value="2">اثنان نجوم</option>

                                    <option value="1">نجمة واحدة</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="gender" class="col-sm-6">الاقسام</label>

                            <div class="col-sm-4">

                                <select class="form-control" id="gender" name="places[0][gender]">

                                    <option value="f">نساء فقط</option>

                                    <option value="m">رجال فقط</option>

                                    <option value="b">عائلات</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="inner_room" class="col-sm-6">عدد الغرف الداخلية</label>

                            <div class="col-sm-2">

                                <input type="number" class="form-control" name="places[0][inner_room]" value="0">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="sleep_room" class="col-sm-6">غرف نوم</label>

                            <div class="col-sm-4">

                                <select class="form-control" id="sleep_room" name="places[0][sleep_room]">

                                    <option value="yes">يوجد</option>

                                    <option value="no">لا يوجد</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6" id="bedType">

                        <div class="Beds">

                            <input type="hidden" class="BedCounter" name="places[0][BedCounter]" value="0">

                            <div class="bed">

                                <div class="form-group">

                                    <label for="type_bed" class="col-sm-6">نوع السرير</label>

                                    <div class="col-sm-4">

                                        <select class="form-control" id="type_bed" name="places[0][type_bed][]">

                                            <option value="two">مزدوج</option>

                                            <option value="one">فردي</option>

                                        </select>

                                    </div>

                                </div>

                                <!-- .control-group-->

                            </div><!-- .bed -->

                        </div><!-- #beds -->

                        <input type="button" value="اضافة سرير" class="addBed btn btn-add">

                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-6">

                        <div class="row">

                            <label for="description" class="col-sm-6">نبذة عن المكان</label>

                            <div class="col-sm-6">

                                <textarea rows="5" cols="5" name="places[0][description]"
                                          class="form-control"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <h3>المرافق</h3>

                <div class="che">

                    <?php $counter = 1; ?>

                    @foreach ($amenities as $amenity)



                        {{--reset the counter after each 4 check boxes--}}

                        <?php $counter >= 5 ? $counter = 1 : ''; ?>



                        {{--if it's the first check box to be added in a row then make that div--}}

                        @if($counter == 1)

                            <div class="input-group form-group">

                                @endif


                                <label class="checkbox-inline" for="checkboxitem-<?php echo $loop->iteration;?>">

                                    <input id="checboxitem-<?php echo $loop->iteration;?>" class="input_checkboxitem"
                                           type="checkbox" name="places[0][amenities][]" value="{{$amenity->name}}">

                                    {{$amenity->name}}

                                </label>


                                <?php $counter++;?>



                                {{--close the div element after adding four check boxes        --}}

                                @if($counter >= 5)

                            </div>

                        @endif



                        {{-- add the button إضافة خدمة in the last loop --}}

                        @if($loop->last)



                            @if($counter >= 5)

                                <div class="input-group form-group">

                                    @endif


                                    <label id="extraAmenity">

                                        <button class="btn btn-add2" type="button" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample">

                                            اضافة خدمة

                                            <i class="fa fa-plus-circle "></i>

                                        </button>

                                        <div class="collapse" id="collapseExample">

                                            <input type="text" class="form-control" name="places[0][newAmenity]">

                                        </div>

                                    </label>


                                </div>



                            @endif







                            @endforeach


                </div>

                <h3>السعر الاساسي في الليلة</h3>

                <div class="form-group">

                    <div class="col-sm-4">

                        <div class="input-group">

                            <span class="input-group-addon" id="basic-addon2">SAR/ الليلة</span>

                            <input type="text" class="form-control" name="places[0][price]" placeholder="1200"
                                   aria-describedby="basic-addon2"></div>

                        </div>

                        <div class="col-sm-4">

                            <input style="display: none" type="button" value="إزاله المكان" id="removeItem"
                                   class="btn btn-md btn-danger">

                        </div>

                </div>


                <div class="form-group">
{{--                        <div class="input-group">--}}

{{--                            <label>--}}
{{--                                With deposit--}}
{{--                                <input type="radio" name="places[0][deposit]" onclick="show--}}
{{--                                ($(this).parent().parent().next().attr('id'));"--}}
{{--                                       value="1" />--}}
{{--                            </label><br />--}}
{{--                            <label>--}}
{{--                                Without deposit <input type="radio" name="places[0][deposit]" onclick="hide--}}
{{--                                ($(this).parent().parent().next().attr('id'));" value="0" />--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div id="deposit_check" style="display:none;">--}}
{{--                            <div>--}}
{{--                                <div class="input-group" style="float: right;display:table;width:30%;">--}}
{{--                                    <span class="input-group-addon" id="basic-addon3">SAR/ deposit amount</span>--}}
{{--                                    <input type="text" class="form-control" name="places[0][deposit_amount]"--}}
{{--                                       aria-describedby="basic-addon3"--}}
{{--                                />--}}
{{--                                </div>--}}
{{--                                <div class="input-group" style="float: right;display:table;width:30%;--}}
{{--                                margin-right:20px;">--}}
{{--                                    <span class="input-group-addon" id="basic-addon4">Deposit days</span>--}}
{{--                                    <input type="text" class="form-control" name="places[0][deposit_day]"--}}
{{--                                            aria-describedby="basic-addon4"--}}
{{--                                        />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                </div>


                <hr>


            </div><!-- .item -->

            <div id="addedNewItems">


            </div>

        </div><!-- #items -->

        <input type="button" value="إضافة مكان آخر" id="addItem" class="btn btn-lg btn-info">

        <!-- clone step -->

        <hr>

        <div class="step-2-errorMessages">

        </div>

        <input type="button" name="previous" class="previous btn btn-default"
               value="{{Lang::get('esteraha.backButton')}}"/>

        <input type="button" name="next" class="next btn btn-info" value="متابعة"/>

    </fieldset>

    <fieldset class="wight">

        <h2>تعبئة البيانات</h2>

        <h4>أنت صاحب القرار هنا! نحن بحاجة للأساسيات فقط حتى نساعدك على البدء. بعد أن تتم التوقيع سيكون بإمكانك إجراء
            التغييرات.</h4>

        <div class="stepwizard">

            <div class="stepwizard-row">

                <div class="stepwizard-step active">

                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>

                    <p>بيانات عامة</p>

                </div>

                <div class="stepwizard-step active">

                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>

                    <p>تفاصيل المكان</p>

                </div>

                <div class="stepwizard-step active">

                    <button type="button" class="btn active btn-circle">2</button>

                    <p>رفع الصور</p>

                </div>

                <div class="stepwizard-step">

                    <button type="button" class="btn btn-circle">3</button>

                    <p>الأتفاقيه</p>

                </div>

            </div>

        </div>

        <div class="form-group uplo">
            <div class="panel panel-default">
                <div class="panel-heading">صور مكان الاقامة</div>
                <div class="panel-body">
                    <h4>سنقوم بعرض هذه الصور في صفحة مكان الإقامة الخاص بك على التطبيق.</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="upload_pics">
                                <!-- Dropzone here -->
                                <div class="upload-drop-zone" id="drop-zone">
                                    Just drag and drop files here
                                </div>

                                <div class="js-upload-finished">
                                    <div class="list-group imageUploads">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="tex">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">استعراض اختيار ملفّ رفع ليس لديك أية صور مهنية؟ لا
                                        عليك.
                                    </div>
                                    <div class="panel-body">
                                        هاتف سمارت، كاميرا رقمية

                                        <ul>
                                            <li>اضبط إعدادات الكاميرا الخاصة بك لأعلى دقة ممكنة</li>
                                            <li>التقط صور أفقية، استمتع بالتقاط الصور لمكان الإقامة الخاص بك.</li>
                                            <li>احفظ الصور كملف JPEG. على جهاز الكمبيوتر الخاص بك</li>
                                            <li>حملها هنا!</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="step-3-errorMessages">
        </div>

        <input type="button" name="previous" class="previous btn btn-default"
               value="{{Lang::get('esteraha.backButton')}}"/>
        <input type="button" name="next" class="next btn btn-info" value="متابعة"/>
    </fieldset>

    <fieldset class="wight">
        <h2>تعبئة البيانات</h2>
        <h4>أنت صاحب القرار هنا! نحن بحاجة للأساسيات فقط حتى نساعدك على البدء. بعد أن تتم التوقيع سيكون بإمكانك إجراء
            التغييرات.</h4>
        <div class="stepwizard">
            <div class="stepwizard-row">
                <div class="stepwizard-step active">
                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>
                    <p>بيانات عامة</p>
                </div>
                <div class="stepwizard-step active">
                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>
                    <p>تفاصيل المكان</p>
                </div>
                <div class="stepwizard-step active">
                    <button type="button" name="prevstep" class="btn pre-active btn-circle"><i class="fa fa-check"></i>
                    </button>
                    <p>رفع الصور</p>
                </div>
                <div class="stepwizard-step active">
                    <button type="button" class="btn active btn-circle">3</button>
                    <p>الأتفاقيه</p>
                </div>
            </div>
        </div>

        <strong>اتفاقية مكان الاقامة الخاص بكم ESTRAHA.COM</strong>

        <hr>

        <div class="alert alert-info" role="alert">لإدراج شقتك بأسرع وقت ممكن، يرجى قبول الشروط والأحكام الخاصة بنسبة
            العمولة أدناه.
        </div>

        <div class="agree">

            <div class="row">

                <div class="col-sm-5">

                    <h1>بين : </h1>

                    <p>

                        Booking.com B.V.

                        Herengracht 597

                        1017 CE Amsterdam

                        Netherlands


                        السجل التجاري لغرفة التجارة والصناعة أمستردام، رقم الملف: 31047344، رقم ضريبة القيمة المضافة:
                        NL805734958B01، رقم التسجيل سلطة حماية البيانات الهولندية: 1288246.

                    </p>

                </div>

                <div class="col-sm-2">

                    <div class="rist"></div>

                </div>

                <div class="col-sm-5">

                    <h1>وأنتم : اسمك</h1>

                    <p>

                        <strong>اسم مكان الاقامة</strong>

                    <div>المكان هنا</div>

                    </p>

                    <p>

                        <strong>جهة الاتصال</strong>

                    <div>المكان هنا</div>

                    </p>

                    <p>

                        <strong>اسم السجل التجاري للمكان</strong>

                    <div>المكان هنا</div>

                    </p>

                    <p>

                        <strong>العنوان</strong>

                    <div>المكان هنا</div>

                    </p>

                </div>

                <div class="col-sm-12">

                    <h1>قد اتفقنا علي ما يلي : </h1>

                    <p>

                        <strong>نسبة العمولة</strong>

                    <div>ستكون نسبة العمولة 15% <a href="#" data-toggle="modal" data-target="#myModal">ما الذي ساحصل
                            عليه مقابل العمولة التي سادفعها ؟</a></div>

                    </p>

                    <p>

                        <strong>التنفيذ والاداء</strong>

                    <div>تدخل الاتفاقية حيز التنفيذ فقط بعد الموافقة والتأكيد من قبل Booking.com B.V.</div>

                    </p>

                    <p>

                        <strong>شروط التسليم العامة</strong>

                    <div>الاتفاقية محكومة وخاضعة لشروط التسليم العامة ("<a href="#" data-toggle="modal"
                                                                           data-target="#myModal2">الشروط والأحكام</a>).
                        يقر مكان الإقامة بأنه قرأ الاتفاقية ووافق على الشروط والأحكام.

                    </div>

                    </p>

                    <p>

                        <strong>التاريخ</strong>

                    <div>17-4-2017</div>

                    </p>

                    <p>

                    <div class="alert alert-info" role="alert">

                        <h3>يرجى وضع علامة في المربعات أدناه:</h3>

                        <label><input type="checkbox" name="agree">أشهد بأن هذا مكان إقامة تجاري شرعي مع كافة التراخيص
                            والتصاريح اللازمة، والتي يمكن ابرازها عند الطلب من المرة الأولى. تحتفظ Booking.com B.V.
                            بالحق في التحقق والتحقيق في أي من التفاصيل التي تقدمها في نموذج التسجيل هذا.</label>

                        <label><input type="checkbox" checked name="agreeon">لقد قرأت ووافقت علي شروط <a href="#"
                                                                                                         data-toggle="modal"
                                                                                                         data-target="#myModal2">التسليم
                                العامة</a></label>


                    </div>

                    </p>


                    <p>

                        <strong>أوشكت علي الانتهاء</strong>

                    <div>سنرسل لك نسخة موقعة من الاتفاقية عبر البريد الإلكتروني بعد الانتهاء. وتذكر بأنه يمكنك إغلاق
                        مكان الإقامة الخاص بك مؤقتًا أو إزالته تمامًا من Booking.com في أي وقت.
                    </div>

                    </p>


                </div>


                <div class="col-sm-6 col-sm-offset-3">

                    <div class="step-4-errorMessages">

                    </div>

                    <button type="submit" class="btn btn-block btn-lg btn-info">اغلاق</button>

                </div>

            </div>

        </div>

    </fieldset>


</div>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">ما الذي أحصل عليه مقابل العمولة التي أدفعها؟</h4>

            </div>

            <div class="modal-body">

                <div class="why-commission">

                    <dl>

                        <dt>

                            حضور قوي على الشبكة العنكبوتية

                        </dt>

                        <dd>

                            نعمل في Booking.com على تسويق صفحة مكان الاقامة الخاص بك على محركات البحث مثل جوجل وبينج
                            وياهو للتأكد من أن صفحتك متوفرة للعملاء من جميع أنحاء العالم، مما يرفع إمكانية زيادة عدد
                            حجوزاتك المحتملة بشكل كبير.

                        </dd>


                        <dt>

                            أدوات وخصائص مبتكرة

                        </dt>

                        <dd>

                            يعمل فريق من الخبراء من ذوي المهارات العالية باستمرار على الموقع الإلكتروني وتطبيقات الجوال
                            لمواكبة أحدث التطورات في عالم الانترنت، وضمان تحسين الصفحة الخاصة بك لتشجع على اجراء
                            الحجوزات.

                        </dd>


                        <dt>

                            تأكيد فوري

                        </dt>

                        <dd>

                            يتم تأكيد جميع الحجوزات التي تتم من خلال Booking.com على الفور لهذا لن يكون عليك اتخاذ أي
                            خطوات اضافية.

                        </dd>


                        <dt>

                            تقييمات مُتحقّق منها

                        </dt>

                        <dd>

                            فريق متخصص يتحقق من تقييمات الضيوف، للتأكد من كونها مشروعة. مما يمنحك المصداقية ويساعد
                            الضيوف في المحتملين على اتخاذ قرار الاقامة معك.

                        </dd>


                        <dt>

                            خدمة دعم على مدار الساعة

                        </dt>

                        <dd class="last">

                            يعمل فريق الدعم لدينا على مدار الساعة لمساعدتك وضيوفك - وذلك في 41 لغة.

                        </dd>

                    </dl>

                </div>

            </div>

            <div class="modal-footer text-center">

                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">اغلاق</button>

            </div>

        </div>

    </div>

</div>

<!-- Modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">الشروط والاحكام</h4>

            </div>

            <div class="modal-body">


                <div class="agrt">


                    <p align="right"><strong>GDT's Booking.com BV v151125</strong></p>

                    <h3>شروط التسليم العامة</h3>

                    <p>تشكّل شروط التسليم العامة هذه ("<strong>الشروط</strong>") جزءًا لا يتجزأ من اتفاقية مكان الإقامة
                        ("<strong>اتفاقية مكان الإقامة</strong>") ويُشار إليها مع الشروط باسم
                        ("<strong>الاتفاقية</strong>") المبرمة بين مكان الإقامة وشركة Booking.com (يُشار إليهما منفردين
                        باسم <strong>"الطرف"</strong> ومجتمعين باسم ("<strong>الطرفان</strong>").</p>


                    <h4>1. التعريفات</h4>

                    <p>إضافة إلى الأحكام الوارد تعريفها في موضع آخر بهذه الاتفاقية، تسري التعريفات التالية على هذه
                        الاتفاقية بأكملها، ما لم يظهر مغزى آخر خلافًا لذلك:</p>

                    <p>"<strong>ضمان أفضل الأسعار</strong>" يعني الضمان الذي تصدره Booking.com (بهذا الاسم أو بأي اسم
                        مشابه)، والذي يشير إلى أن Booking.com تقدم أفضل سعر للغرفة وأنه لا يمكن العثور على سعر أقل عبر
                        الإنترنت لغرفة مكافئة بنفس تاريخي تسجيل الوصول والمغادرة وبنفس شروط الحجز.</p>

                    <p>"<strong>النظام الأساسي لـ Booking.com"</strong> يعني موقع أو مواقع Booking.com على شبكة الإنترنت
                        أو التطبيقات أو الأدوات أو النظم الأساسية أو الأجهزة الأخرى لـ Booking.com التي تتاح عليها
                        الخدمة.</p>

                    <p>"<strong>خدمة العملاء</strong>" تعني مكتب خدمة عملاء Booking.com الذي يمكن الوصول إليه عبر عنوان
                        البريد الإلكتروني customer.service@booking.com أو أي عنوان آخر منصوص عليه في هذه الاتفاقية.</p>

                    <p>"<strong>الخصم المباشر</strong>" يعني التعليمات التي يعطيها مكان الإقامة إلى المصرف الذي يتعامل
                        معه بأن Booking.com مخولة لتحصيل أي مبالغ مباشرة من الحساب المصرفي لمكان الإقامة.</p>

                    <p>"<strong>الإكسترانت</strong>" تعني نظام الإنترنت الذي يمكن الوصول إليه من قِبل مكان الإقامة (بعد
                        تطابق اسم المستخدم وكلمة المرور) عبر موقع الويب www.booking.com/hotelaccess، لتحميل معلومات مكان
                        الإقامة (بما فيها الأسعار والتوفر والغرف) والحجوزات و/أو تغييرها و/أو التحقق منها و/أو تحديثاتها
                        و/أو تعديلاتها.</p>

                    <p>"<strong>حدث قهري</strong>" يعني أي من الأحداث التالية التي تؤثر على العديد من الضيوف ومرافق مكان
                        الإقامة: القضاء والقدر، الانفجارات البركانية، الكوارث (الطبيعية)، الحرائق، الحروب، الأعمال
                        العدائية أو أي طوارئ محلية أو قومية، الغزو، الاستجابة لأي طلب من أي ميناء أو سلطة عامة محلية
                        كانت أو إقليمية، التنظيمات والتدخلات الحكومية، التحركات العسكرية، الحرب الأهلية أو الإرهاب،
                        الانفجارات (البيولوجية، الكيميائية أو النووية)، الثورات، أحداث الشغب، العصيان المدني، الاضطرابات
                        المدنية (أو التهديدات المادية أو الاعتقال المبرر لأي من الأحداث الجارية)، مرافق النقل
                        والمواصلات، إغلاق أي من المطارات أو أي حدث استثنائي أو كارثي آخر، الظروف والطوارئ، التي تجعل من
                        المستحيل أو من غير القانوني أو تمنع الضيوف من السفر أو البقاء في مكان الإقامة.</p>

                    <p>"<strong>الضيف</strong>" يعني زائراً للمنشأة أو عميلاً لمكان الإقامة أو نزيلاً به.</p>

                    <p>"<strong>حق الملكية الفكرية</strong>" يعني أي براءة اختراع أو حق طبع ونشر أو اختراعات أو حقوق
                        قاعدة بيانات أو حق تصميم أو تصميم مسجل أو علامة تجارية أو اسم تجاري أو ماركة أو شعارات أو علامة
                        خدمة أو تقنية أو نموذج منفعة أو تصميم غير مسجل أو - حيثما يتصل بالموضوع - أي تطبيق لأي من مثل
                        هذا الحق أو التقنية أو الاسم التجاري أو اسم المهنة أو اسم النطاق (ضمن أي امتداد، مثل: .com، .nl،
                        .fr، .eu، وما إلى ذلك) أو أي حق أو التزام آخر مشابه، سواء كان مسجلاً أو غير مسجل، أو أي حق ملكية
                        صناعية أو فكرية آخر يوجد في أي إقليم أو ولاية قضائية في العالم.</p>

                    <p>"<strong>النظم الأساسية</strong>" تعني موقع أو مواقع Booking.com على شبكة الإنترنت أو التطبيقات
                        أو الأدوات أو النظم الأساسية و/أو أجهزة أخرى لـ Booking.com أو شركاتها التابعة وشركائها
                        التجاريين التي يتاح فيه أو فيها الخدمة.</p>

                    <p>"<strong>الخدمة</strong>" تعني نظام Booking.com لحجز مكان الإقامة عبر الإنترنت الذي يمكن لأماكن
                        الإقامة من خلاله الإعلان عن توفر غرفها للحجز، والذي يمكن للنزلاء من خلاله إجراء الحجوزات في
                        أماكن الإقامة تلك وخدمة تسهيل الدفعات.</p>


                    <h4>2. التزامات مكان الإقامة</h4>

                    <p><u>2.1 معلومات مكان الإقامة</u></p>

                    <p>2.1.1 تشتمل المعلومات المقدمة من أماكن الإقامة لتضمينها في النظم الأساسية على المعلومات المتعلقة
                        بمكان الإقامة (بما في ذلك الصور والصور الفوتوغرافية والأوصاف)، ووسائل الراحة والخدمات التي
                        يقدمها والغرف المتوفرة للحجز، وتفاصيل الأسعار (بما في ذلك كل الضرائب والضرائب الإضافية والرسوم)،
                        وسياسات التوافر والإلغاء وعدم الحضور والسياسات والقيود الأخرى ("<strong>معلومات مكان
                            الإقامة</strong>") وتتوافق مع الصيغ والمعايير المقدمة من Booking.com. ولا يجب أن تتضمن
                        معلومات مكان الإقامة أي أرقام هاتف أو فاكس أو عناوين بريد إلكتروني (بما في ذلك سكايب) أو مواقع
                        التواصل الاجتماعي (بما في ذلك تويتر وفيسبوك) بإشارات مباشرة إلى مكان الإقامة أو مواقعه على شبكة
                        الإنترنت أو التطبيقات أو الأدوات أو النظم الأساسية أو أجهزة أخرى أو إلى مواقع شبكة الإنترنت أو
                        التطبيقات أو الأدوات أو النظم الأساسية أو أجهزة أخرى لأطراف ثالثة. وتحتفظ Booking.com بالحق في
                        تحرير أي معلومة أو استبعادها عندما ينمو إلى علمها أن مثل هذه المعلومة غير صحيحة أو ناقصة أو
                        تنتهك أحكام هذه الاتفاقية وشروطها. </p>

                    <p>2.1.2 يضمن مكان الإقامة ويتعهد بأن تكون معلومات مكان الإقامة حقيقية ودقيقة وغير مضللة في جميع
                        الأوقات. ويتحمل مكان الإقامة في جميع الأوقات المسؤولية عن تقديم بيان معلومات صحيح وحديث، بما في
                        ذلك التوفر الإضافي للغرف لمدة معينة أو أي أحداث أو مواقف استثنائية (ذات تأثير مادي عكسي) (مثل:
                        تجديد أو أعمال بناء بالمرفق أو بالقرب منه). ويحدّث مكان الإقامة معلومات الفندق على أساس يومي (أو
                        على أي أساس أكثر تكرارًا حسبما يكون مطلوبًا) ويجوز في أي وقت تغيير ما يلي عبر الإكسترانت: (1)
                        سعر غرفه المتوفرة القابلة للحجز، و(2) عدد الغرف المتوفرة ونوعها. </p>

                    <p>2.1.3 تظل المعلومات المقدمة من مكان الإقامة للنظم الأساسية ملكية حصرية لمكان الإقامة. ويجوز تحرير
                        المعلومات المقدمة من مكان الإقامة أو تعديلها من قِبل Booking.com، وتجوز ترجمتها لاحقًا إلى لغات
                        أخرى؛ حيث تظل الترجمات ملكية حصرية لشركة Booking.com. والمحتوى المحرر أو المترجم يكون للاستخدام
                        الحصري من قِبل Booking.com على النظم الأساسية ولا يُستخدم (بأي طريقة أو شكل) من قِبل مكان
                        الإقامة لأي قناة توزيع أو مبيعات أخرى أو أي أغراض أخرى. ولا يُسمح بإجراء تغييرات أو تحديثات على
                        المعلومات الوصفية للفندق، ما لم يتم الحصول على موافقة خطية مسبقة من Booking.com</p>

                    <p>2.1.4 ما لم تتفق Booking.com على خلاف ذلك، تُجرى كل تغييرات معلومات الفندق و/أو تحديثاتها و/أو
                        تعديلاتها (بما في ذلك الأسعار والتوفر والغرف) من قِبل مكان الإقامة مباشرة وعلى الإنترنت عبر
                        الإكسترانت أو أي وسيلة أخرى تحددها Booking.com بشكل معقول. تعالج Booking.com في أقرب وقت ممكن
                        بشكل معقول التحديثات والتغييرات في ما يتعلق بالصور والصور الفوتوغرافية والأوصاف.</p>


                    <p><u>2.2 التكافؤ وقيود الغرف</u></p>

                    <p>2.2.1 يجب على مكان الإقامة توفير تكافؤ التوافر والأسعار لـ Booking.com
                        (<strong>"التكافؤ"</strong>) </p>

                    <p>يعني <u>تكافؤ الأسعار</u> أن تكون الأسعار متساوية أو أفضل لنفس مكان الإقامة ولنفس نوع الغرفة
                        ولنفس التواريخ ولنفس عدد الضيوف ونفس المرافق والإضافات أو أفضل (مثلاً: الفطور، خدمة الواي فاي،
                        تسجيل المغادرة المتأخر أو تسجيل الوصول المبكر) ولنفس القيود والسياسات أو أفضل وسياسة تعديلات
                        وإلغاء الحجز كما هي متوفرة على موقع أو مواقع مكان الإقامة أو التطبيقات أو مراكز الاتصال (بما في
                        ذلك نظام الحجز للعملاء)، أو مباشرة في مكان الإقامة مع أي من منافسي Booking.com (التي تشمل وكيل
                        أو وسيط حجز على الإنترنت أو غير الإنترنت) و/أو أي طرف ثالث (على الإنترنت أو غير الإنترنت) تربطه
                        شراكة مع مكان الإقامة أو متعلق أو مرتبط به بأي شكل آخر. لا ينطبق تكافؤ الأسعار فيما يتعلق
                        بالأسعار التي تستهدف مجموعة مغلقة من المستخدمين ("مجموعة المستخدمين المغلقة" هي مجموعة من القيود
                        المحددة حيث تكون العضوية غير تلقائية وحيث: (i) يختار المستهلكون بنشاط أن يصبحوا أعضاء، (ii) أي
                        واجهة مستخدم على الأنترنت أو متنقلة يستخدمها مجموعة مغلقة من الأعضاء وتكون بكلمة سر محمية، (iii)
                        قد استكمل أعضاء مجموعة المستخدمين المغلقة ملف العميل الشخصي و (iv) أي سعر تم عرضه أو تم توفيره
                        على الأقل حجز مسبق واحد للمستهلك كعضو من مجموعة المستخدمين المغلقة. بشرط أن تكون هذه الأسعار
                        ليست معلنة وجعلها (متاحة) بشكل (مباشر أو غير مباشر). في حالة عدم وجود أسعار معلنة لمجموعة مغلقة
                        من المستخدمين بشكل (مباشر أو غير مباشر) (جعلها) متاحة (عن طريق مكان الإقامة، أو شركة منافسة لـ
                        Booking.com بشكل (مباشر / غير مباشر) أو على (أنظمة أساسية) لطرف ثالث (بما في ذلك أي محركات بحث
                        (وصفية) أو مواقع إلكترونية لمقارنة الأسعار)، يحق لـ Booking.com الحصول على سعر متكافئ مع هذا
                        السعر.</p>

                    <p><u>تكافؤ التوافر</u> يعني أن مكان الإقامة سيقوم بتزويد Booking.com بالتوافر (مثال: الغرف المتوفرة
                        للحجز على النظام الأساسي) التي هي على الأقل ملائمة مثل التي تم تزويد منافسي Booking.com بها (بما
                        في ذلك أي وكيل أو وسيط حجز على الإنترنت أو غير الإنترنت) و/أو أي طرف ثالث آخر (على الإنترنت أو
                        غير الإنترنت) والذي هو شريك تجاري متعلق أو مرتبط بمكان الإقامة بأي شكل من الأشكال.</p>

                    <p>2.2.2 يتم عرض القيود والشروط للغرف المتوفرة للحجز على نظام Booking.com الأساسي (بما في ذلك سعر
                        الغرفة) ويجب أن تتوافق دائماً مع البند 2.2.1 ويكون مفهوماً لجميع الأطراف المعنية (بما في ذلك
                        المستهلكين).</p>

                    <p>2.2.3 يكون لـ Booking.com الحق في منح خصم على سعر الغرفة - من نفقتها الخاصة التي تصل إلى مستوى
                        العمولة - لأعضاء مجموعة المستخدمين الخاصة بها.</p>

                    <p>2.2.4 انطلاقًا من جوهر هذه الاتفاقية والتزامًا في جميع الأوقات بتكافؤ التوافر المنصوص عليه
                        بالفقرة 2.2.1، يتم تشجيع مكان الإقامة على توفير نصيب عادل من جميع فئات الغرف لصالح Booking.com
                        (بما في ذلك السياسات والقيود المختلفة) والأسعار المتوفرة خلال مدة هذه الاتفاقية (أثناء فترات
                        انخفاض وارتفاع الطلب (بما في ذلك أثناء المؤتمرات والمعارض والمناسبات الخاصة)).</p>


                    <p><u>2.3 العمولة</u></p>

                    <p>2.3.1 لكل حجز يتم إجراؤه بواسطة الضيف لغرفة على النظم الأساسية، يتوجب على مكان الإقامة دفع عمولة
                        إلى Booking.com (<strong>"العمولة"</strong>) يتم احتسابها طبقاً للبند 2.3.2. ويتم السداد طبقاً
                        للبند 2.4. </p>

                    <p>2.3.2 العمولة الإجمالية للحجز تساوي حاصل ضرب (أ) عدد الليالي التي أقامها الضيف في مكان الإقامة، و
                        (ب) سعر الحجز في الليلة الواحدة للغرفة الواحدة (بما في ذلك رسوم الخدمة وضرائب المبيعات وباقي
                        الضرائب الوطنية والحكومية والقطاعية وضرائب الولاية والبلدية أو الضرائب والرسوم المحلية (لكن
                        باستثناء ضرائب القيمة المضافة وضرائب المدينة) (والتي يشار إليها بشكل جماعي وفردي "<strong>بالضرائب</strong>"))
                        والضرائب والرسوم الأخرى المشمولة في السعر المقدم في وقت حجز الغرفة من قبل الضيف على المنصات (مثل
                        الإفطار والوجبات (وجبتين، أو ثلاث وجبات) واستئجار الدراجة الهوائية ورسوم الأشخاص الإضافيين ورسوم
                        المنتجع والأسرّة المتحركة وتذاكر المسرح ورسوم الخدمة، إلخ). (ج) عدد الغرف المحجوزة من قبل الضيف،
                        و (د) نسبة العمولة المرتبطة والمحددة في الاتفاقية (يضاف إليها ضريبة القيمة المضافة\الضرائب (إن
                        وجدت)). وتجنباً للشك، في حال دفع سعر الغرفة من قبل الضيف لمكان الإقامة وفقاً للبند 4.4 (خدمة
                        تسهيل الدفعات)، ستحتسب Booking.com العمولة في حال عدم الحضور أو الإلغاء بالتوافق مع البند 4.4.8
                        وفي جميع الحالات الأخرى ستخصم العمولة في حال فائض الحجوزات أو حالات عدم الحضور (إلا إذا قام مكان
                        الإقامة بإعلام Booking.com بحالة عدم الحضور المذكورة خلال يومي عمل بعد تاريخ تسجيل المغادرة
                        المحدد من قبل الضيف) أو حالات الإلغاء التي يتم احتساب عمولتها (الإلغاء الذي يتضمن خرق في سياسة
                        الإلغاء الحر الخاصة بمكان الإقامة) وستحتسب بالتوافق مع الحجز المؤكد.</p>

                    <p>2.3.3 ما لم يُتفق على خلاف ذلك في الاتفاقية، يكون السعر المعروض للنزلاء على النظم الأساسية شاملاً
                        ضريبة القيمة المضافة، وضريبة المبيعات، والنفقات وجميع الضرائب أو الرسوم أو النفقات أو الضرائب
                        الأخرى (المحلية أو الحكومية أو الإقليمية أو الخاصة بولاية أو بلدية أو محلية) (إلى المدى الذي
                        يجوز عنده حساب مثل هذه الضرائب والرسوم والضرائب الأخرى مقدمًا وبشكل معقول دون معلومات
                        إضافية).</p>

                    <p>2.3.4 في حالة وجوب عرض الأسعار للنزلاء شاملةً ضريبة القيمة المضافة، وضريبة المبيعات وجميع الضرائب
                        والرسوم والضرائب الأخرى (المحلية أو الحكومية أو الإقليمية أو الخاصة بولاية أو بلدية أو محلية)
                        وذلك تماشيًا مع (تعديل أو اتفاق على تنفيذ) القانون المعمول به، والقواعد والقوانين السارية على
                        مكان الإقامة، يعدّل مكان الإقامة الأسعار عبر الإكسترانت وفقًا لأحكام الفقرتين 2-1-2 و2-1-4 في
                        أقرب وقت ممكن، ولكن على أية حال في غضون 5 أيام عمل بعد (1) تعديل واتفاق على تنفيذ القانون ذي
                        الصلة، والقواعد والقوانين السارية في هذا الصدد على مثل مكان الإقامة هذا، أو (2) إرسال إخطار بذلك
                        من قِبل Booking.com.</p>

                    <p>2.3.5 يتم عرض بيانات جميع الحجوزات التي تم إجراؤها في مكان الإقامة على إكسترانت من خلال النظم
                        الأساسية والعمولة المطابقة. في أول يوم من كل شهر، يتوفر بيان الحجوزات التي تمت على الإنترنت
                        ("<strong>بيان حجوزات على الإنترنت</strong>") على إكسترانت ويعرض جميع الحجوزات لجميع الضيوف
                        اللذين يقع تاريخ مغادرتهم في الشهر السابق.</p>


                    <p><u>2.4 سداد العمولة</u></p>

                    <p>2.4.1 إصدار فاتورة عمولة الحجوزات التي تمت في شهر ميلادي يحتوي على تاريخ المغادرة (المحدد) للنزيل
                        في مثل هذا الشهر (باستثناء عمليات الإلغاء غير المقيدة التي تمت عبر Booking.com ووفقًا لسياسة
                        الإلغاء المتبعة لدى مكان الإقامة) وتُدفع في الشهر التالي وفقًا للشروط التالية:</p>

                    <p>(a) تُعالج الفواتير على أساس شهري، وتُرسل إلى مكان الإقامة عبر البريد أو البريد الإلكتروني. </p>

                    <p>(b) يدفع مكان الإقامة العمولة المذكورة في الفاتورة عن شهر في غضون 14 يومًا من تاريخ الفاتورة.</p>

                    <p>(c) يجب أن يتم السداد بواسطة مكان الإقامة مباشرة إلى Booking.com عن طريق الخصم المباشر، أو عدم
                        توفر هذا النظام البنكي من البنك الذي يجرى منه عملية السداد، عن طريق التحويل السلكي (إلى البنك
                        المعني كما تم تحديده لـ Booking.com)). قد تقوم Booking.com من وقت لآخر بتسوية (الجزء المتعلق) من
                        الفاتورة بالتوافق مع البند 4.4 للحجوزات التي تم الدفع لها وفقاً للبند 4.4. وتجنباً للشك، طرق
                        الدفع الأخرى (كالشيكات أو عبر "وكالات الدفع") لا يمكن معالجتها من قبل Booking.com وبالتالي لن
                        يتم قبولها. يتحمل مكان الإقامة كافة النفقات كما يتم فرضها من قبل البنوك لتحويل الأموال.</p>

                    <p>(d) تُدفع جميع مبالغ العمولة المقرر تسديدها بموجب هذه الاتفاقية بأموال خالصة، ودون أي خصم أو
                        تعويض وخالية وخالصة من وبدون خصم لـ أو مقابل أي ضرائب ورسوم وواردات وعوائد أو نفقات ورسوم
                        واقتطاعات أي كان نوعها تُفرض الآن أو لاحقًا من قِبل أي سلطة حكومية أو مالية. وإذا فُرض على مكان
                        الإقامة إجراء مثل هذا الخصم أو الاقتطاع، فإنه يدفع إلى Booking.com أي مبالغ إضافية ضرورية لضمان
                        استلام Booking.com المبلغ (الصافي) بأكمله كما هو محدد في الفاتورة التي تستلمها Booking.com خالية
                        من الخصم. ويُسأل مكان الإقامة ويتحمل المسؤولية القانونية عن دفع أو تحويل أي ضرائب وواردات وعوائد
                        ونفقات ورسوم واقتطاعات تفوق أو تزيد عن مبلغ العمولة (الصافي) المستحق لشركة Booking.com على
                        الفندق.</p>

                    <p>(e) يتوجب على الفندق دفع العمولة/الفواتير المصدرة شهرياً بالعملة المناسبة أو حسب سعر الصرف - إن
                        أمكن والمعادل للفاتورة الأصلية. وتحمل Booking.com على عاتقها إعداد الفواتير إما بالعملات
                        المتداولة عالمياً (مثل اليورو / الدولار) أو العملة المحلية وبعدها يتم تحويل ما يعادل نفس المبلغ
                        النهائي إلى العملات المحلية أو العملات السائدة على أساس سعر صرف اليوم الأخير من كل شهر والتي
                        تصدر فيه الفاتورة وليس في يوم المغادرة. ويعتبر سعر الصرف المستخدم هو سعر الفائدة بين البنوك (
                        حتى وقت الإقفال الساعة 4:00 بتوقيت شرق الولايات المتحدة) و التي تصدرها المصارف المالية الدولية
                        الكبرى أو شركات الخدمات المصرفية الكبرى من وقت لوقت يختاره Booking.com.</p>

                    <p>2.4.2 يكون مكان الإقامة مسئولاً عن حجب أو الإبلاغ عن الضرائب ذات الصلة (المذكورة أعلاه في البند
                        2.4.1 تحت الفقرة د) ينطبق على استحقاق العمولة لـ Booking.com حسب قواعد الضريبة ذات الصلة
                        والممارسات وطلبات السلطات الضريبية. يتحمل مكان الإقامة مسئولية السداد والتحويلات المالية للضرائب
                        المفروضة على العمولة (المدفوعات) وما يرتبط بها من فوائد نتيجة للتأخر في السداد والغرامات التي
                        تفرضها مصلحة الضرائب لعدم القدرة على حجب أو الإبلاغ عن الضرائب المفروضة على العمولة. عند
                        الضرورة، سيكون مكان الإقامة مسئولاً بشكل منفرد في التفاوض والاتفاق مع السلطات الضريبية المعنية
                        بشأن المعاملات على العمولة (المدفوعات). سيتوجب على مكان الإقامة تزويد Booking.com بناء على طلب
                        Booking.com الأول بنسخ (صورة/مسح ضوئي) شهادات سداد الضرائب/شهادات الإعفاء الضريبي عند كل تحول
                        للعمولة. يقدم مكان الإقامة المستندات على التسجيل مع جميع السلطات الضريبية ذات الصلة (بما في ذلك
                        السلطات القانونية (المحلية) لتحصيل الإيرادات المحلية المعمول بها) كمقدم فندق أو مكان إقامة إلى
                        غير ذلك.. </p>

                    <p>2.4.3 في حالة نشوب أي نزاع بين Booking.com ومكان الإقامة (كالخلاف على مبلغ العمولة)، يدفع أي مبلغ
                        عمولة ليس محل نزاع وفقًا لأحكام هذه الاتفاقية، بغض النظر عن حالة النزاع أو طبيعته.</p>

                    <p>2.4.4 في حالة تأخر الدفع، تحتفظ Booking.com بالحق في المطالبة بالفوائد القانونية و/أو تعليق
                        الخدمة بموجب الاتفاقية (مثل تعليق مشاركة مكان الإقامة في النظم الأساسية)، و/أو طلب ضمان مصرفي أو
                        أي شكل آخر من أشكال الضمان المالي من مكان الإقامة.</p>

                    <p>2.4.5 يدفع مكان الإقامة عربونًا مساويًا للمبلغ المنصوص عليه في اتفاقية مكان الإقامة ("<strong>العربون</strong>").
                        وإذا لم يتم الاتفاق على مثل هذا المبلغ، يجب على مكان الإقامة أن يدفع - بناءً على طلب خطي مسبق من
                        Booking.com - عربونًا بمبلغ مساوٍ لعمولة شهرين (يُحدد بناء على تقدير Booking.com، ويُنظر إلى هذا
                        المبلغ أيضًا باعتباره العربون). ونحتفظ بالعربون كضمان لوفاء مكان الإقامة بالتزاماته (الخاصة
                        بالدفع) بموجب الاتفاقية. وعند إنهاء هذه الاتفاقية، يُرد العربون أو أي رصيد منه بعد خصم العمولة
                        المستحقة ومبالغ العجز والتكاليف الأخرى المستحقة لشركة Booking.com (ويُؤدَى هذا الرصيد في جميع
                        الأوقات أثناء مدة هذه الاتفاقية بناءً على طلب خطي مسبق من Booking.com) إلى مكان الإقامة في غضون
                        30 يومًا بعد تسوية كاملة للالتزامات والمسؤوليات المستحقة (بما في ذلك العمولة المستحقة). وبناءً
                        على طلب خطي مسبق من Booking.com، يدفع مكان الإقامة عربونًا آخر بالمبلغ الإضافي الذي تطلبه
                        Booking.com إذا زادت العمولة المستحقة عن العربون أو إذا تكرر إخفاق مكان الإقامة في دفع العمولة
                        عند استحقاقها. ولا يؤدي مبلغ العربون بأي حال من الأحوال إلى الحد من مسؤولية مكان الإقامة أو
                        إلغائها بموجب هذه الوثيقة. ولا تُفرض أي فائدة على العربون. </p>


                    <p><u>2.5 الحجز وحجز الضيف والشكاوى وضمان افضل الأسعار</u></p>

                    <p>2.5.1 عندما يتم إجراء الحجز بواسطة الضيف على النظام الأساسي، سيتلقى مكان الإقامة رسالة تأكيد لكل
                        حجز تم إجراؤه عبر Booking.com، سيتضمن تأكيد الحجز تاريخ الوصول وعدد الليالي ونوع الغرفة (بما في
                        ذلك تفضيل التدخين (إذا كان متوفرا)) وسعر الغرفة واسم الضيف والعنوان وبيانات البطاقة الائتمانية
                        ("<strong>بيانات الضيف</strong>" بشكل عام) وطلب أو طلبات محددة قام الضيف بذكرها. Booking.com
                        ليست مسئولة عن صحة واكتمال البيانات (بما في ذلك بيانات البطاقة الائتمانية) والتواريخ التي قام
                        الضيف بتزويدها لـ Booking.com بواسطة الضيف وBooking.com غير مسئولة عن أية التزامات السداد
                        المتعلقة بالحجز (على الإنترنت) الخاصة بالضيف. لتجنب الشك، يتوجب على مكان الإقامة التحقق والتأكد
                        بشكل اعتيادي (لكن على الأقل بشكل يومي) على إكسترانت (حالة) الحجز الذي تم إجراؤه.</p>

                    <p>2.5.2 عند طريق إجراء الحجز من خلال النظم الأساسية سيتم عمل عقد مباشر (ولذلك علاقة قانونية) بشكل
                        منفرد بين مكان الإقامة والضيف ("<strong>حجز الضيف</strong>"). </p>

                    <p>2.5.3 يلتزم مكان الإقامة بقبول الضيف كطرف متعاقد، والتعامل مع الحجز عبر الإنترنت وتأكيد الحجز
                        (بما في ذلك السعر) وفقًا لمعلومات مكان الإقامة الواردة في النظم الأساسية في وقت إجراء الحجز، بما
                        في ذلك أي معلومات تكميلية و/أو رغبات أبداها الضيف. </p>

                    <p>2.5.4 بخلاف الرسوم والرسوم الإضافية والنفقات (الإضافية) المذكورة في الحجز المؤكد، لا يفرض مكان
                        الإقامة على العميل أي رسوم أو نفقات تعامل/إدارية نظير استخدام أي وسيلة دفع (مثل رسوم بطاقة
                        ائتمان).</p>

                    <p>2.5.5 يتعامل مكان الإقامة مع الشكاوى والمطالبات فيما يخص (منتجات أو خدمات معروضة أو منقولة أو
                        مقدمة من) مكان الإقامة أو طلبات خاصة مقدمة من الضيوف، بدون أي وساطة من Booking.com أو تدخل منها.
                        ولا تُسأل Booking.com وتخلي مسؤوليتها عن أي مسؤولية قانونية في ما يتعلق بمثل هذه المطالبات
                        المقدمة من الضيوف ويجوز لشركة Booking.com في جميع الأوقات وبمحض إراداتها أن (أ) تقديم خدمة (دعم)
                        العملاء إلى نزيل، أو (ب) التوسط بين مكان الإقامة والضيف، أو (ج) توفير إقامة بديلة - على حساب
                        مكان الإقامة - ذات معايير مساوية أو أفضل في حالة وجود زيادة في الحجز أو مخالفات مادية أو شكاوي
                        فيما يتعلق بمكان الإقامة، أو (د) أو مساعدة الضيف بطريقة أخرى في تواصله مع مكان الإقامة أو في
                        اتخاذ فعل ضده.</p>

                    <p>2.5.6 في حالة أي مطالبة قانونية للنزيل بموجب ضمان أفضل الأسعار، تخطر Booking.com مكان الإقامة
                        فورًا بمثل هذه المطالبة وتزود مكان الإقامة بالتفاصيل ذات الصلة بالمطالبة. ويعدّل مكان الإقامة
                        فورًا - وإلى الحد المسموح به - السعر أو الأسعار المتاحة على النظم الأساسية لـ Booking.com، بحيث
                        يُتاح سعر أقل لحجز آخر أو حجوزات أخرى. إضافة إلى ذلك، يعدّل مكان الإقامة فورًا في معلوماته
                        الإدارية سعر الحجز الذي أجراه الضيف. وعند تسجيل خروج الضيف، يعرض مكان الإقامة الغرفة بالسعر
                        الأقل، و(1) يسوي الفرق بين السعر الذي تم الحجز به والسعر الأقل، وذلك من خلال محاسبة الضيف بالسعر
                        الأقل، أو (2) يرد إلى الضيف الفرق بين السعرين نقدًا.</p>


                    <p><u>2.6 الزيادة في الحجوزات والإلغاء</u></p>

                    <p>2.6.1 يوفر مكان الإقامة الغرف المحجوزة، وإذا لم يتمكن مكان الإقامة من الوفاء بالتزاماته بموجب هذه
                        الاتفاقية لأي سبب من الأسباب، يخبر مكان الإقامة ذو الصلة شركة Booking.com فورًا عبر خدمة العملاء
                        ( customer.service@booking.com؛ حيث يشار إلى "زيادة في الحجوزات" في موضوع كل رسالة بريد
                        إلكتروني. ما عدا في حالة توفير Booking.com لإقامة بديلة (حتى يتم التحقق منها بواسطة مكان الإقامة
                        مع Booking.com)، وسيبذل مكان الإقامة قصارى جهده لاتخاذ التدابير البديلة بنفس الجودة أو أفضل على
                        نفقة مكان الإقامة وفي حالة عدم توفر أي غرفة عند الوصول، يجري مكان الإقامة ما يلي:</p>

                    <p>(a) العثور على إقامة بديلة مناسبة بنفس مستوى مكان الإقامة المسئول عن الحجز المضمون للنزيل أو
                        أفضل، و </p>

                    <p>(b) توفير وسيلة مواصلات خاصة ومجانية إلى مكان الإقامة البديل للنزيل والأعضاء التابعين له الواردة
                        أسماؤهم في رسالة تأكيد الحجز، و</p>

                    <p>(c) تعويض Booking.com و/أو الضيف بجميع التكاليف والنفقات المعقولة (على سبيل المثال تكلفة الإقامة
                        البديلة، والمواصلات، والمكالمات الهاتفية) التي تكبدها الضيف أو عانى منها أو قام بدفعها و/أو
                        Booking.com بسبب الزيادة في الحجوزات. ويجب دفع أي مبلغ تفرضه Booking.com في هذا الصدد في غضون 14
                        يوماً من استلام الفاتورة.</p>

                    <p>2.6.2 لا يُسمح لمكان الإقامة بإلغاء أي حجز عبر الإنترنت. </p>

                    <p>2.6.3 لا تُفرض عمولة على عمليات الإلغاء التي يجريها النزلاء قبل الوقت والتاريخ الذين يتم بعدهما
                        فرض رسوم إلغاء. وتُفرض عمولة وفقًا لأحكام هذه الاتفاقية على عمليات الإلغاء التي يجريها النزلاء
                        بعد الوقت والتاريخ الذين يتم بعدهما فرض رسوم إلغاء.</p>


                    <p><u>2.7 ضمان بطاقة الائتمان</u></p>

                    <p>2.7.1 باستثناء الحجوزات المدفوعة عن طريق خدمة تسهيل الدفعات. (في هذه الحالة هذا الشرط لا ينطبق
                        2.7) يستند ضمان الحجز إلى تفاصيل بطاقة الائتمان التي يقدمها النزيل أو الشخص المسئول عن الحجز.
                        يجب على مكان الإقامة في جميع الأوقات قبول بطاقات الائتمان الرئيسية (بما في ذلك ماستر كارد وفيزا
                        وأميريكان إكسبريس) كضمان للحجز. يتحمل مكان الإقامة مسؤولية التحقق من صلاحية تفاصيل بطاقة
                        الائتمان هذه، والتفويض (المسبق) لبطاقة الائتمان وحد الائتمان في تاريخ إقامة أو إقامات الليالي
                        المحجوزة. وبعد تلقي حجز، يتحقق مكان الإقامة فورًا من صحة التفويض المسبق لبطاقة الائتمان. إذا لم
                        تقدم بطاقة الائتمان أي ضمان، يخطر مكان الإقامة فورًا شركة Booking.com التي تدعو النزيل في ما بعد
                        إلى توفير ضمان للحجز بطريقة أخرى. وإذا لم يتمكن النزيل أو لا ينوي إجراء ذلك، يجوز لشركة
                        Booking.com إلغاء الحجز بناء على طلب مكان الإقامة. وإذا لم تكن بطاقة الائتمان (أو أي ضمان بديل
                        يقدمه النزيل) سارية المفعول أو صالحة لأي سبب من الأسباب، يتحمل مكان الإقامة دائمًا تبعية ذلك
                        والمسؤولية الناجمة عنه. ولا تُفرض أي عمولة على الحجوزات التي تُلغى من قِبل Booking.com وفقًا
                        لهذه الفقرة 2.7.1</p>

                    <p>2.7.2 على مكان الإقامة الذي يرغب في خصم المبالغ من بطاقة الائتمان قبل تاريخ تسجيل الدخول أن يضمن
                        شرح شروط الدفع المسبق (بما في ذلك قيود الأسعار (الخاصة) وأحكامها وشروطها المعنية أو المتصلة بمثل
                        هذا الدفع المسبق) بوضوح إلى النزلاء في المعلومات التي تُتاح للنزيل قبل إجراء حجز، وأن ترد ضمن
                        معلومات مكان الإقامة.</p>

                    <p>2.7.3 ويتحمل مكان الإقامة مسؤولية تحصيل رسوم عدم الحضور أو الإقامة الفعلية أو الإلغاء المدفوع من
                        الضيف (بما في ذلك الضرائب المفروضة الذي يُسأل عنها مكان الإقامة ويحولها إلى الهيئات الضريبية
                        المعنية). وتُخصم المبالغ من بطاقات الائتمان بنفس العملة المحدد في الحجز الذي أجراه النزيل. وإلى
                        الحد الذي يسمح بذلك، يجوز لمكان الإقامة الخصم من بطاقة ائتمان النزيل بعملة مختلفة بسعر صرف معقول
                        وعادل.</p>

                    <p>2.7.4 في حال توفير الغرف مقابل الدفع نقدا فقط، لن يتم توفير أي تفاصيل متعلقة ببطاقة الائتمان من
                        قبل Booking.com إلى مكان الاقامة (كل منها "<strong>أماكن الإقامة التي تقبل نقداً فقط</strong>"
                        أو <strong>COA</strong>") كضمان للحجز.</p>


                    <p><u>2.8 حماية بيانات البطاقة الائتمانية</u></p>

                    <p>2.8.1 يجب على كل مكان إقامة الالتزام والتأكد من التزام جميع مقدمي الخدمات له بشكل دائم،
                        بالمتطلبات، ومعايير الالتزام وعمليات التحقق كما تم تحديدها مسبقاً في معايير حماية البيانات
                        الخاصة بسوق بطاقات الدفع التي يتم إصدارها من وقت إلى آخر من قبل كبرى شركات بطاقات الائتمان. </p>

                    <p>2.8.2 يقر مكان الإقامة بمسؤوليته عن حماية بيانات حامل البطاقة الائتمانية في سياق هذه الاتفاقية
                        وتعترف Booking.com بمسؤوليتها عن حماية بيانات حامل البطاقة الائتمانية للبيانات التي تقوم
                        بمعالجتها في سياق هذه الاتفاقية.</p>


                    <p><u>2.9 التسويق المباشر إلى الضيوف</u></p>

                    <p>يوافق مكان الإقامة على عدم استهداف الضيوف الذين حصل عليهم بواسطة Booking.com على وجه الخصوص سواء
                        عن طريق العروض الترويجية أو الرسائل الالكترونية المرغوب بها أو غير المرغوب بها على الإنترنت أو
                        غير الإنترنت.</p>


                    <p><u>2.10 الإكسترانت</u></p>

                    <p>تزود Booking.com مكان الإقامة بمعرّف مستخدم وكلمة مرور يتيحان لمكان الإقامة الدخول إلى
                        الإكسترانت. ويحمي مكان الإقامة معرّف المستخدم وكلمة المرور ويحافظ على سريتهما ويخزنهما في مكان
                        آمن ولا يفصح عنهما إلى أي شخص غير أولئك الذين بحاجة إلى الدخول إلى الإكسترانت. ويخطر مكان
                        الإقامة شركة Booking.com فورًا بأي (اشتباه في) انتهاك أمني أو استخدام غير سليم.</p>


                    <p><u>2.11 حدث قهري</u></p>

                    <p>في حالة وقوع حدث قهري، لن يقوم مكان الإقامة باقتطاع أيه مبالغ من النزلاء (وسوف يعيد لهم ما دفعوه
                        (إذا تطلب الأمر ذلك) المتأثرين بالحدث القهري أي رسوم أو تكاليف أو نفقات أو مبالغ أخرى (ويشمل ذلك
                        المبالغ (غير القابلة للرد) رسوم الإقامة أو عدم الحضور، رسوم (تغيير) الحجز أو الإلغاء) خاصة بما
                        يلي (1) أي إلغاء أو تغيير للحجز التي تم من قبل النزلاء، أو (2) فترة الحجز غير المستنفذة، بسبب
                        الحدث القهري. وفي حالة الشكوك المسببة والمبررة، يحق لمكان الإقامة أن يطلب من الضيوف تقديم دليل
                        واضح على العلاقة بين الحدث القهري وإلغاء أو عدم تنفيذ أو تغيير الحجز (وتقديم نسخة من هذا الدليل
                        إلى Booking.com عند الطلب). وحتى تقوم Booking.com بتسجيل أي إلغاء أو عدم تنفيذ أو تعديل للحجز
                        بسبب الحدث القهري، يجب على مكان الإقامة إبلاغBooking.com خلال يومين عمل بعد (أ) تاريخ المغادرة
                        المجدول للإلغاء أو عدم الحضور، أو (ب) حساب المغادرة، عدد أيام الإقامة الفعلية. لن تفرض
                        Booking.com أية رسوم في حالة عدم الحضور المسجل أو الإلغاء المسجل أو عن الفترة المسجلة غير
                        المستنفذة من الحجز بسبب الحدث القهري.</p>


                    <h4>3. الترخيص</h4>

                    <p>3.1 يمنح مكان الإقامة بموجب هذه الوثيقة شركة Booking.com حقًا وترخيصًا (أو ترخيصًا من الباطن
                        حسبما يكون ساريًا) غير حصريين ودون امتيازات وحول العالم للقيام بما يلي:</p>

                    <p>(a) لاستخدام عناصر حقوق الملكية الفكرية لمكان الإقامة المتفق عليها والمقدمة إلى Booking.com من
                        قِبل مكان الإقامة واستخراجها والاستعانة بالغير لاستخراجها وتوزيعها وترخيصها من الباطن ونشرها
                        وإتاحتها بأي طريقة وعرضها وفقًا لهذه الاتفاقية، واللازمة لشركة Booking.com لمباشرة حقوقها وأداء
                        التزاماتها بموجب هذه الاتفاقية،</p>

                    <p>(b) لاستخدام معلومات مكان الإقامة واستخراجها والاستعانة بالغير لاستخراجها وتوزيعها وترخيصها من
                        الباطن وعرضها واستغلالها (بما في ذلك - على سبيل المثال لا الحصر - أداؤها علنًا وتعديلها وتكييفها
                        ونشرها واستخراجها ونسخها وإتاحتها للجمهور بأي طريقة من الطرق).</p>

                    <p>3.2 يجوز لشركة Booking.com أن ترخص من الباطن معلومات مكان الإقامة (بما في ذلك حقوق الملكية
                        الفكرية ذات الصلة) والعروض الخاصة المتاحة من قِبل مكان الإقامة على النظم الأساسية وجميع الحقوق
                        والتراخيص الأخرى المنصوص عليها في هذه الاتفاقية وتتيحها وتفصح عنها وتعرضها عبر (موقع شبكة
                        الإنترنت أو التطبيقات أو الأدوات أو أجهزة أخرى) الشركات التابعة و/أو طرف ثالث (" النظم الأساسية
                        <strong>للطرف الثالث</strong> ") أو بالتعاون معها. </p>

                    <p>3.3 ولا تتحمل Booking.com المسؤولية بأي حال من الأحوال تجاه مكان الإقامة عن أي فعل أو سهو من جانب
                        أي مواقع أطراف ثالثة. والتعويض الوحيد الذي يحق لمكان الإقامة في ما يخص مواقع ويب الأطراف الثالثة
                        هذه هو مطالبة Booking.com (التي لها الحق وليس عليها أي التزام) بما يلي (1) تعطيل موقع ويب
                        الأطراف الثالثة هذا أو قطع الاتصال به، أو (2) إزالة مكان الإقامة (بما في ذلك معلومات مكان
                        الإقامة) من موقع ويب الأطراف الثالثة هذا ، أو إنهاء هذه الاتفاقية، على أن يتم هذا كله وفقًا
                        لأحكام هذه الاتفاقية.</p>


                    <h4>4. التصنيف وتقييمات الضيوف والتسويق وخدمة تسهيل الدفعات (الوكالة)</h4>

                    <p><u>4.1 التصنيف</u></p>

                    <p>4.1.1 تحدد Booking.com تلقائيًا ومن جانب واحد ("<strong>التصنيف</strong>")الذي يظهر به مكان
                        الإقامة على النظم الأساسية ("التصنيف"). ويستند التصنيف إلى عوامل متعددة ويتأثر بها، بما في ذلك -
                        على سبيل المثال لا الحصر - النسبة المئوية للعمولة المدفوعة (أو المقرر دفعها) من قِبل مكان
                        الإقامة، والحد الأدنى للتوفر المحدد من قبِل مكان الإقامة، وعدد الحجوزات مقارنةً بعدد زيارات صفحة
                        مكان الإقامة المعني على النظم الأساسية ("<strong>التحويل</strong>"),والحجم المتوفر لدى مكان
                        الإقامة، ونسبة عمليات الإلغاء وتقييم آراء النزلاء بالنقاط وسجل خدمة العملاء وعدد شكاوى النزلاء
                        ونوعها وسجل مكان الإقامة من الدفعات التي تم تسديدها في المواعيد المحددة.</p>

                    <p>4.1.2 يمكن لمكان الإقامة أن يؤثر في ترتيبه بتغيير النسبة المئوية للعمولة والتوافر لفترات زمنية
                        معينة، وتحسين العوامل الأخرى على نحو مستمر. لا ينبغي على مكان الإقامة القيام بأي مطالبة ضد
                        Booking.com بشأن تصنيف أماكن الإقامة؛ حيث يعمل نظام التصنيف بشكل تلقائي.</p>


                    <p><u>4.2 تقييمات الضيوف</u></p>

                    <p>4.2.1 سيطلب من النزلاء اللذين أقاموا في مكان الإقامة إبداء رأيهم في مكان الإقامة ومنحه درجات أوجه
                        محددة متعلقة بإقامتهم. </p>

                    <p>4.2.2 تحتفظ Booking.com بالحق في نشر هذه التعليقات والدرجات على الأنظمة الرئيسية. يقر مكان
                        الإقامة بأن Booking.com هو موزع (بدون الالتزام بالتحقق) وليس ناشراً لهذه التعليقات. </p>

                    <p>4.2.3 تتعهد Booking.com ببذل قصارى جهدها في متابعة ومراجعة آراء النزلاء فيما يتعلق باستخدام
                        الألفاظ النابية أو ذكر أسماء الأشخاص. تحتفظ Booking.com بالحق في رفض وتعديل وحذف التعليقات غير
                        المناسبة في حال تتضمن ألفاظاً نابية أو ذكر أسماء الأشخاص.</p>

                    <p>4.2.4 لن تدخل Booking.com في أية مناقشات أو مفاوضات أو مراسلات مع مكان الإقامة حول (المحتوى أو
                        العواقب المتعلقة بالنشر والتوزيع) لآراء النزلاء.</p>

                    <p>4.2.5 لا تقع على Booking.com أية مسئولية وتتنصل من المسئولية عن المحتوى والعواقب المتعلقة (بالنشر
                        أو التوزيع) لأي من الملاحظات أو التعليقات كيفما أو أيما كانت.</p>

                    <p>4.2.6 تستخدم تعليقات النزلاء بشكل حصري بواسطة Booking.com ويمكن إتاحتها على النظم الأساسية من وقت
                        لآخر بواسطة Booking.com. تحتفظ Booking.com بجميع حقوق الملكية حصرياً وحق الملكية والانتفاع
                        (بجميع الحقوق الملكية الفكرية) لتعليقات النزلاء ولا يحق لمكان الإقامة (بشكل مباشر أو غير مباشر)
                        نشر أو تسويق أو ترويج أو كشط أو ربط (فائق أو مغمور) أو دمج أو الحصول على أو الاستفادة من أو
                        المزج أو مشاركة أو استخدام تعليقات النزلاء بدون موافقة خطية مسبقة من Booking.com.</p>


                    <p><u>4.3 التسويق (الإلكتروني) ودعاية الدفع مقابل النقر</u></p>

                    <p>4.3.1 يحق لـ Booking.com دعم مكان الإقامة باستخدام اسم أو أسماء مكان الإقامة بالتسويق الالكتروني،
                        بما في ذلك التسويق عبر البريد الالكتروني و/أو دعاية الدفع مقابل النقر. تدير Booking.com حملات
                        تسويق إلكتروني على نفقتها الخاصة وتحت تصرفها.</p>

                    <p>4.3.2 أن يكون مكان الإقامة على علم بأساليب عمل محركات البحث مثل عنكبوتية المحتوى وترتيب العناوين
                        الالكترونية. توافق Booking.com على إذا أصبح مكان الإقامة على علم بسلوكيات نظم طرف ثالث تنتهك
                        حقوق مكان الإقامة الفكرية، من ثم سيقوم مكان الإقامة بإخطار Booking.com خطياً مع تفاصيل الإجراء
                        وسوف تقوم Booking.com باستخدام مساعيها التجارية المعقولة للتأكد من أن الطرف الثالث ذي الصلة يتخذ
                        الإجراءات المناسبة لمعالجة هذا الانتهاك.</p>

                    <p>4.3.3 يوافق مكان الإقامة ألا يستخدم ، يعرض ، يستفيد من وجودد ، يشير الى او يستهدف تحديداً العلامة
                        التجارية / شعار التابع لـ Booking.com(بما في ذلك الاسم التجاري، العلامة التجارية أو علامة خدمة
                        أو دلائل أخرى مماثلة الهوية أو المصدر) سواء بشكل مباشر من خلال مشتريات الكلمات الرئيسية التي
                        تستخدم حقوق Booking.com للملكية الفكرية، لأغراض المقارنة السعر أو أي أغراض أخرى (سواء على منصة
                        مكان الإقامة أو أي منصة طرف ثالث، أو نظامه أو محرك أو غير ذلك)، إلا إذا حصل على الموافقة الخطية
                        من قبل Booking.com..</p>


                    <p><u>4.4 خدمة تسهيل الدفعات</u></p>

                    <p>4.4.1 يوافق مكان الإقامة ويقر بأن Booking.com قد (في جميع الأوقات كوكيل) - ومن وقت لآخر، وفي بعض
                        الولايات القضائية ولأماكن اقامة معينة يمكن لها أن تسهل عمليات دفع معينة (المسبقة/ العربون) على
                        سعر الغرفة (كما هو موضح أدناه) من قبل الضيوف إلى مكان الإقامة (عند توفرها) كحوالة مصرفية،
                        ومدفوعات بطاقات الائتمان أو غيرها من أشكال الدفع عبر الإنترنت ويمكن أن يتم تجهيزها بالنيابة عن
                        مكان الإقامة (كتسوية كاملة ونهائية للدفعة) عن طريق ما يسمى ("<strong>خدمة تسهيل الدفعات</strong>").
                        ويمكن لـ Booking.com من وقت لآخر إشراك طرف ثالث لتسهيل ومعالجة عملية الدفع ("<strong>معالج
                            الدفع</strong>"). ويتم تقديم خدمة تسهيل الدفعات مجاناً.</p>

                    <p>4.4.2 يوافق ويقر مكان الإقامة بأن لكل حجز المبلغ الإجمالي ذو الصلة الخاص بالحجز (بما في ذلك
                        الضرائب والرسوم المطبقة والإضافات والملحقات التي يتم إجراؤها أو مشمولة أثناء عملية الحجز (مثال:
                        الإفطار) إلى الحد المفصح عنه إلى Booking.com من قبل مكان الإقامة (ما لم يتبين خلاف ذلك لـ
                        Booking.com) سيتم جمعها ومعالجتها عن طريق معالج الدفع (المبلغ ذو الصلة يشار إليه "<strong>سعر
                            الغرفة</strong>") وفقًا لسياسة الدفع المعمول بها في مكان الإقامة للحجز ذي الصلة ويفصح عنه
                        على المنصة. </p>

                    <p>4.4.3 يوافق ويقر مكان الإقامة بأنه يجوز لـ Booking.com من وقت لآخر استخدام والاستفادة من خدمة
                        تسهيل الدفعات. بواسطة Booking.com (بما في ذلك وسائل الدفع (عبر الإنترنت) مثل بطاقات الائتمان
                        الافتراضية) لأجل (i) سداد (مسبق / عربون) لسعر الغرفة بواسطة الضيف إلى مكان الإقامة عن طريق معالج
                        الدفع في التسوية النهائية لمثل هذه الدفعة و (ii) تسوية وسداد المستحقات والعمولة المتعلقة بـ أ )
                        بالـ COAs العملولة المستحقة من خلال تحديد العمولة المستحقة المتوافقة مع الفقرة 4.4. ب) تسوية
                        وسداد المستحقات والعمولة التي لم تسدد من خلال سداد المستحقات والعمولة والمبالغ الأخرى المستحقة
                        الدفع من قبل مكان الإقامة إلى Booking.com لجميع أسعار الغرف التي تم تنفيذها في أي وقت بواسطة
                        معالج الدفع. طالما أن هناك أموال كافية لتسوية ودفع المبالغ المستحقة لـ Booking.com، يجوز لـ
                        Booking.com تحصيل المبالغ ذات الصلة عن طريق الخصم المباشر (إن وجدت) أو يجب على مكان الإقامة بناء
                        على طلب Booking.com دفع المبلغ ذو الصلة إلى الحساب البنكي من وقت لآخر كما يتم تحديده من قبل
                        Booking.com. </p>

                    <p>4.4.4 يوافق ويقر مكان الإقامة بأنه - في أي وقت - يكون مسؤولًا عن تحصيل وتحويل والحجب والدفع
                        للسلطات (الضريبية) ذات الصلة (إن وجدت) بشأن الضرائب ذات الصلة والتكاليف (الإضافية) والإضافات
                        والمبالغ والرسوم غير المشمولة بسعر الغرفة) والتحويلات والحجب والمدفوعات (إن وجدت) للضرائب
                        المتعلقة بالعمولة للسلطات الضريبية ذات الصلة. ما لم تقم Booking.com بالإشارة إلى ضرائب ورسوم
                        محددة وتكاليف إضافية (مثال: وجبة إفطار) أو أية مبالغ أخرى غير مشمولة بسعر الغرفة ("<strong>العناصر
                            المستبعدة"</strong>")، لا يجوز لمكان الإقامة تحصيل أو طلب مبالغ إضافية من الضيف ما لم يكن
                        مدرجًا بسعر الغرفة (باستثناء العناصر المستبعدة (إن وجدت)).</p>

                    <p>4.4.5 لتحويل المبلغ ذي الصلة الذي تم تحصيله (بعد الخصم والتسوية (إن وجدت) بالنسبة للمستحقات
                        والعمولة الرسوم والتكاليف والنفقات والمبالغ الأخرى الغير مسددة لصالح Booking.com)، <strong>صافي
                            القيمة</strong>، يجب على مكان الإقامة تزويد Booking.com ببيانات البنك ذات الصلة التي سيتم
                        تحويل المبالغ ذات الصلة عليه سيتم تزويده ببطاقة ائتمانية إفتراضية ("<strong>البطاقة
                            الإفتراضية</strong>") لتحصيل المبلغ المستحق. يمكن للبطاقة الافتراضية او يجرى عليها التفويض
                        المسبق او الخصم حسب تاريخ الدفع. للدفع عن طريق التحويل البنكي: ستقوم Booking.com بتحويل المبلغ
                        الصافي خلال 14 يوم بعد نهاية الشهر الذي يجري فيه الضيف تسجيل المغادرة. يقر مكان الإقامة بأن
                        الدفعة الأولى يجب أن يتم إجراؤها فقط بناء على تنفيذ الحجز الأول. يجوز لـ Booking.com في أي وقت
                        تعليق سداد سعر الغرفة بدون إشعارات في حالة (زعم أو الاشتباه) في تزوير (بطاقة ائتمانية) أو
                        الاحتيال أو الإخلال ببنود العقد. يقبل ويقر مكان الإقامة بأنه نظرًا لتقلبات أسعار صرف العملات
                        والتكاليف والرسوم التي تفرضها البنوك وشركات البطاقات الائتمانية والوسطاء (لتحصيل ومعالجة ودفع
                        الأموال ذات الصلة) الآخرين، قد يكون هناك اختلافات بين سعر الغرفة (كما تم إدارجه في النظام بواسطة
                        مكان الإقامة)، والمبلغ الذي تم تحصيله والمبلغ المدفوع لمكان الإقامة. يجب على مكان الإقامة تحمل
                        مخاطر وتكاليف ورسوم تحويل العملات التي تفرضها البنوك على تحصيل الأموال والتحويل لسعر الغرفة، حيث
                        أن Booking.com سوف تقوم بتحصيل الرسوم كما وضعها مكان الإقامة على الإكسترانت لخدمات نموذج الدفع
                        التي تدار من قبل Booking.com لتغطية التكاليف والرسوم. فإن المبالغ المودعة من قبل معالج الدفع أو
                        أي طرف ثالث لمكان الإقامة أو نيابة عنه لن يترتب عليها فوائد.على أن تكون الأموال المعادة ذات
                        الصلة متاحة للتحصيل على البطاقة الافتراضية من قبل مكان الإقامة لمدة 6 أشهر بعد تاريخ تسجيل
                        المغادرة.</p>

                    <p>4.4.6 في حال حصول انشطة احتيالية (مزعومه) من قبل مكان الإقامة أو في حال مطالبة Booking.com بموجب
                        القانون أو بأمر قضائي أو تعليمات أو أوامر (شبه) حكومية أو قرارات تحكيمية (أو أحكام مماثلة)، وجود
                        أمر جلب أو سياسة إلغاء لرد المبالغ الإجمالي أو جزء من سعر الغرفة، (أو غير ذلك بقدر معقول وعادل)،
                        تحتفظ Booking.com بالحق في مطالبة مكان الإقامة برد المبلغ المدفوع (لاعادة دفعه) إلى الضيف والذي
                        تلقاه مكان الإقامة) (على أن يتم سداد الدفعة في غضون 14 يوماً من تاريخ طلب من Booking.com
                        لذلك).</p>

                    <p>4.4.7 طالما وافق مكان الإقامة على رد إجمالي أو جزء من سعر غرفة غير قابلة للاسترداد (أو جزء منه)،
                        يحق لـ Booking.com تسوية المبلغ ذي الصلة بالنيابة عن مكان الاقامة لصالح الضيف مع المبالغ الأخرى
                        التي تم تحصيلها بواسطة معالج الدفع أو - إذا طُلب من قبل مكان الإقامة وتم الموافقة عليه من قبل
                        Booking.com - يجب دفع ونقل المبلغ ذي الصلة إلى Booking.com في غضون 14 يوم بعد موافقة
                        Booking.com.ويجب على Booking.com أن تقوم بتحويل المبلغ المناسب للضيف في أقرب وقت ممكن من الناحية
                        التنظيمية والتقنية اعتبارا من اللحظة التي يصبح فيها الاستحقاق واجبا من الناحية القانونية وعدم
                        خصم عمولة على مكان الاقامة على هذا المبلغ المسترد</p>

                    <p>4.4.8 إذا لم يحضر الضيف أو في حالة الإلغاء، يحق لـ Booking.com تحصيل عمولة على المبلغ ذي الصلة
                        المتعلق بسعر الغرفة الذي تم تحصيله وتحويله لصالح مكان الإقامة. في حالة الحجوزات الفائضة، سيتم
                        احتساب العمولة وفقًا للبند 2.3.2.</p>

                    <p>4.4.9 يحق لمكان الإقامة إصدار فاتورة للضيف فقط بالمبلغ الإجمالي للحجز (وتقدم هذه الفاتورة بناء
                        على طلب الضيف) بالمبلغ الإجمالي للحجز (بما في ذلك أو مضافًا (كما تتطلب القوانين المعمول بها)
                        جميع الضرائب والرسوم والتكاليف الإضافية المطبقة). لا يحق لمكان الإقامة إصدار فاتورة (أو إرسال
                        فاتورة إلى) Booking.com لحجز أو إقامة.لا يوجد في هذه الاتفاقية ما يشكل أو يعني أن Booking.com
                        تعمل كسجل تجاري أو جهة يمكنها (إعادة) بيع الغرفة.</p>


                    <h4>5. التأكيدات والضمانات</h4>

                    <p>5.1 يؤكد مكان الإقامة ويضمن ما يلي لشركة Booking.com خلال فترة هذه الاتفاقية:</p>

                    <p>(i) لمكان الإقامة كل الحقوق والصلاحيات والسلطات لاستخدام وتشغيل وامتلاك (كما ينطبق) حقوق الملكية
                        الفكرية وترخيصها من الباطن وحمل Booking.com على إتاحتها على النظم الأساسية (أ) مكان الإقامة ذو
                        الصلة و(ب) حقوق الملكية الفكرية في ما يخص معلومات مكان الإقامة المتاحة على النظم الأساسية أو كما
                        هو منصوص عليه أو مشار إليه فيها، و</p>

                    <p>(ii) يستجيب مكان الإقامة ويذعن إلى جميع التصاريح والتراخيص والتفويضات الحكومية الأخرى اللازمة
                        لإجراء عملياته وأعماله وتنفيذها ومواصلتها، وجعل مكان الإقامة متاح للحجز على الأنظمة الأساسية
                        (بما في ذلك الإقامات القصيرة)،</p>

                    <p>(iii) ينطبق ما يلي بالحد الذي لا تحظره القوانين الإلزامية المعمول بها في الولاية القضائية ذات
                        الصلة :يكون سعر الغرف المعلن عنه على النظم الأساسية مماثلاً لأفضل سعر متاح لإقامة مكافئة في مكان
                        الإقامة المعني، ولا يجوز الحصول على سعر أفضل من قِبل نزيل أجرى حجز في مكان الإقامة مباشرة أو عبر
                        طرف (ثالث) آخر أو عبر وسيط آخر أو قناة أخرى، و</p>

                    <p>(iv) مكان الإقامة وإدارته (المباشرة وغير المباشرة والنهائية) والمالكين (المستفيدين) (والمديرين)
                        لا يتصلوا بأي شكل من الأشكال، أو يكونوا جزء من أو مرتبطين بـ أو على علاقة أو خاضعين لسيطرة أو
                        إدارة أو ملكية:</p>

                    <p>(a) إرهابيين أو منظمات إرهابية.</p>

                    <p>(b) (ب) أطراف / أشخاص (1) على النحو الوارد (خاصة) مواطنين من جنسيات محددة / كيانات أو شخص / كيان
                        محظور، أو (2) خاضع لحظر تجاري أو عقوبات مالية أو اقتصادية أو تجارية، و</p>

                    <p>(c) أطراف / أشخاص مدانين بغسل الأموال أو الرشوة أو الاحتيال أو الفساد.</p>

                    <p>يقوم مكان الإقامة بإخطار Booking.com على الفور في حالة خرق البند 5.1 من الفقرة (4).</p>

                    <p>5.2 يؤكد كل طرف ويضمن ما يلي للطرف الآخر خلال فترة هذه الاتفاقية:</p>

                    <p>(i) أنه يمتلك كامل السلطة والصلاحية الاعتباريتين للاتفاق على التزامات وتنفيذها بموجب هذه
                        الاتفاقية، و</p>

                    <p>(ii) أنه اتخذ جميع الإجراءات الاعتبارية التي يقتضيها لإجازة تنفيذ هذه الاتفاقية والوفاء بها،
                        و</p>

                    <p>(iii) تشكل هذه الاتفاقية التزامات قانونية سارية وملزمة لهذا الطرف وفقًا لأحكامها، و</p>

                    <p>(iv) يمتثل كل طرف لجميع قوانين ومدونات ولوائح وأوامر وقواعد البلد أو الولاية أو المجلس المحلي
                        الذي تم بموجب قانونه تأسيس الطرف المعني في ما يتعلق بالمنتجات المعروضة (أو المقرر عرضها) و/أو
                        الخدمات المقدمة (أو المقرر تقديمها) من قِبل مثل هذا الطرف.</p>

                    <p>5.3 باستثناء ما يُنص عليه صراحةً بخلاف ذلك في هذه الاتفاقية، لا يقدم أي طرف تأكيدات أو ضمانات
                        صريحة أو ضمنية في ما يتعلق بموضوع هذه الاتفاقية، ويخلي مسؤوليته بموجب هذه الوثيقة عن أي وكل
                        ضمانات ضمنية، بما في ذلك جميع الضمانات الضمنية المتعلقة باستيفاء أوصاف مطلوبة في السوق أو
                        الملائمة لغرض معين في ما يخص مثل هذا الموضوع. </p>

                    <p>5.4 تخلي Booking.com مسؤوليتها وتتبرأ من أي وكل التزام في ما يخص مكان الإقامة الذي له علاقة بأي
                        تعطل أو انقطاع في الخدمة أو توقف أو عدم توافر (مؤقت و/أو جزئي) للنظم الأساسية، الخدمة، و/أو
                        الإكسترانت. ويوفر Booking.com الخدمة، ومنضة العمل وشبكة الإكسترانت على أساس "كما هي موجودة" و
                        "حسب التوفر".</p>


                    <h4>6. التعويضات والالتزامات</h4>

                    <p>6.1 يتحمل كل طرف ("<strong>الطرف الدافع للتعويض</strong>") المسؤولية تجاه الطرف الآخر("<strong>الطرف
                            المتلقي للتعويض</strong>") )أو مدراءه أو مسئوليه أو موظفيه أو وكلائه أو الشركات التابعة لها
                        أو المتعاقدين معه ( ويعوضه ويدفع عنه ويحميه من وضد أي أضرار وخسائر (باستثناء أي خسارة لمنتج أو
                        ربح أو عائد أو عقد، أو خسارة لشهرة أو سمعة أو تضررها، أو خسارة لمطالبة أو أي خسائر و/أو أضرار
                        خاصة أو غير مباشرة أو تبعية) ومسؤوليات والتزامات وتكاليف ومطالبات من أي نوع وفائدة وغرامات
                        ونفقات إجراءات أو مصاريف قانونية مباشرة (بما في ذلك - على سبيل المثال لا الحصر - أتعاب ونفقات
                        المحاماة المعقولة) دفعها فعلاً الطرف المتلقي للتعويض أو تحملها أو تكبدها نتيجة:</p>

                    <p>(i) انتهاك لهذه الاتفاقية من قِبل الطرف الدافع للتعويض، أو</p>

                    <p>(ii) أي مطالبة من أي طرف ثالث استنادًا إلى أي خرق (مزعوم) من جانب الطرف الدافع للتعويض لحقوق
                        الملكية الفكرية للطرف الثالث.</p>

                    <p>6.2 يعوض مكان الإقامة شركة Booking.com (أو مدراءها أو مسئوليها أو موظفيها أو وكلائها أو الشركات
                        التابعة لها أو المتعاقدين معها) ويكافئها ويمنع عنها الضرر بشكل كامل من وضد أي التزامات أو نفقات
                        أو مصروفات (بما في ذلك - على سبيل المثال لا الحصر - أتعاب ونفقات المحاماة المعقولة)، وأضرار
                        وخسائر وواجبات ومطالبات من أي نوع وفوائد وجزاءات ومصروفات إجراءات قانونية دفعتها Booking.com أو
                        تحملتها أو تكبدتها في ما يخص:</p>

                    <p>(i) جميع المطالبات المرفوعة من النزلاء بشأن معلومات غير دقيقة أو خاطئة أو مضللة عن مكان الإقامة
                        على النظم الأساسية،</p>

                    <p>(ii) جميع المطالبات المرفوعة من النزلاء بشأن إقامة في مكان الإقامة أو إفراط في قبول الحجوزات أو
                        إلغاء (جزئي) أو حجوزات خاطئة أو الدفع بفائدة أو رد مبالغ أو إعادة خصم سعر الغرفة، و</p>

                    <p>(iii) إلى المدى الذي لم يتم عنده تسوية أي مطالبات بموجب ضمان أفضل الأسعار أو وفقًا له بين النزيل
                        ومكان الإقامة عند تسجيل خروج النزيل (بدفع السعر الأقل)، وجميع المطالبات المرفوعة من النزلاء بشأن
                        ضمان أفضل الأسعار أو فقًا له، و</p>

                    <p>(iv) جميع المطالبات الأخرى المرفوعة من النزلاء التي تُعزى كليًا أو جزئيًا إلى مخاطرة مكان الإقامة
                        أو تقديره (بما في ذلك المطالبات التي تخص (نقص) الخدمات المقدمة أو المنتج المعروض من قِبل مكان
                        الإقامة) أو التي تنشأ من ضرر أو احتيال أو إساءة تفسير متعمدة أو إهمال أو خرق لعقد (بما في ذلك
                        حجز النزيل) من قِبل مكان الإقامة أو بسببه في ما يتعلق بالنزيل أو ممتلكاته، و</p>

                    <p>(v) جميع المطالبات المرفوعة ضد Booking.com في ما يخص أو نتيجة إخفاق مكان الإقامة في تحصيل - أو
                        امتناعه عن دفع - أي ضرائب مفروضة أو رسوم أو تكاليف إضافية أو قائمة على الخدمات أو النفقات الأخرى
                        بموجب هذه الوثيقة في الولاية القضائية ذات الصلة (بما في ذلك سعر الغرفة وسداد العمولة).</p>

                    <p>6.3 باستثناء ما هو منصوص عليه خلافًا لذلك في هذه الاتفاقية، فإن الحد الأدنى من مسؤولية طرف تجاه
                        أي طرف آخر بشأن مجمل كل المطالبات المرفوعة ضد مثل هذا الطرف بموجب هذه الاتفاقية أو في ما يتعلق
                        بها في سنة لا يزيد عن مجمل العمولة التي تلقاها مثل هذا الطرف أو دفعها في السنة السابقة أو 100000
                        يورو (أيهما أكبر)، ما لم يكن هناك ضرر أو احتيال أو سوء تصرف متعمد أو إهمال جسيم أو حجم مقصود
                        للمعلومات أو خداع متعمد من جانب الطرف المسؤول (أي الطرف الدافع للتعويض)؛ حيث لا يسري في هذه
                        الحالة حد المسؤولية على مثل هذا الطرف المسؤول. يوافق الطرفان ويقران بعدم سريان أي من حدود
                        المسؤولية المشار إليها في الفقرة 6 على أي من التعويضات في ما يخص مطالبات الطرف الثالث (مثل
                        المطالبات المرفوعة من النزلاء كما هو موضح في الفقرة 6-2) أو مسؤوليات الطرف الثالث.</p>

                    <p>6.4 في حالة رفع مطالبة من قِبل طرف ثالث، يتصرف الطرفان بنية حسنة ويبذلان قصارى جهدهما المعقول
                        لتشاور كل منهما مع الآخر والتعاون معه ومساعدته في الدفاع ضد مثل هذه المطالبة و/أو تسويتها، في
                        حين يحق للطرف الدافع للتعويض تولي مسؤولية أي مطالبة وتدبير الدفاع (بالتشاور والاتفاق مع الطرف
                        المتلقي للتعويض ومراعاة مصالح الطرفين على نحو ملائم)، ولا يجوز لأي طرف تقديم أي اعتراف أو إيداع
                        أي أوراق أو الموافقة على تقييد أي حكم أو الاشتراك في أي حل وسط أو تسوية دون موافقة خطية مسبقة من
                        الطرف الآخر (الذي لا يمتنع عن ذلك أو يتأخر عنه أو يضع شروطًا له دون سبب معقول).</p>

                    <p>6.5 لا يتحمل أي طرف المسؤولية بأي شكل من الأشكال تجاه الطرف الآخر عن أي أضرار أو خسائر غير مباشرة
                        أو خاصة أو عقابية أو عرضية أو تبعية، بما في ذلك خسارة منتج أو خسارة ربح أو خسارة عائد أو خسارة
                        عقد أو خسارة لشهرة أو سمعة أو تضررها، أو خسارة لمطالبة، سواء زُعم أن مثل هذه الأضرار نتيجة
                        لانتهاك عقد أو بسبب ضرر أو خلافه. ويتم التنازل عن مثل هذه الأضرار والخسائر وإخلاء المسؤولية
                        بشأنها صراحة بموجب هذه الوثيقة.</p>

                    <p>6.6 يقر كل طرف أن التدابير القانونية قد لا تكون كافية لحماية الطرف الآخر من أي انتهاك لهذه
                        الاتفاقية، ودون الإخلال بأي حقوق وتدابير أخرى تتأخر بأي شكل آخر للطرف الآخر، يحق لكل طرف الحصول
                        على تعويض قضائي ووفاء مطابق.</p>


                    <h4>7. الفترة والإنهاء والتعليق</h4>

                    <p>7.1 ما لم يُتفق على خلاف ذلك، يبدأ سريان مفعول هذه الاتفاقية في تاريخ هذه الوثيقة وتظل سارية
                        المفعول لمدة سنة واحدة، ما لم ينهيها أي طرف مع مراعاة الواجبة باتخاذ فترة إخطار مدتها 14 يومًا.
                        وبعد فترة السنة الواحدة، تستمر هذه الاتفاقية بعد ذلك لفترة زمنية غير محددة حتى ينهيها أحد
                        الطرفين، شريط إرسال إخطار خطي في غضون 14 يومًا على الأقل إلى الطرف الآخر. </p>

                    <p>7.2 يجوز لكل طرف إنهاء هذه الاتفاقية أو تعليقها في ما يخص الطرف الآخر، وذلك بسريان مفعول فوري
                        ودون الحاجة إلى إخطار إخلال في حالة</p>

                    <p>(a) ارتكاب الطرف الآخر انتهاكًا ماديًا لأي من أحكام هذه الاتفاقية (مثل تأخير الدفع أو العجز عن
                        تسديد دين أو انتهاك ضمان تكافؤ الأسعار أو تقديم معلومات غير صحيحة أو تلقي عدد كبير من شكاوى
                        النزلاء)، أو</p>

                    <p>(b) (ملئ أو تقديم طلب) إفلاس أو تعليق الدفع (أو إجراء أو حدث مماثل) في ما يخص الطرف الآخر. </p>

                    <p>7.3 أي إشعار أو تواصل من Booking.com بمضمون "إغلاق" ("إغلاق"، "تم الإغلاق") موجه لمكان الإقامة
                        الموجود على الموقع الإلكتروني (أو صيغة مماثلة) تعني إنهاء الاتفاق . بعد الإنهاء، يفي مكان
                        الإقامة بالحجوزات المستحقة للنزلاء ويدفع كل العمولات (بالإضافة إلى النفقات والفائدة إن وجدت)
                        المستحقة على هذه الحجوزات وفقًا لأحكام هذه الاتفاقية.</p>

                    <p>7.4 تعتبر الحالات التالية بأي حال من الأحوال انتهاكاً مادياً وتعطي لـ Booking.com الحق في إنهاء
                        (إغلاق) أو تعليق الاتفاقية فوراً (دون إشعار مسبق):</p>

                    <p>(i) إخفاق مكان الإقامة في دفع العمولات في تاريخ استحقاقها أو قبله، أو </p>

                    <p>(ii) نشر مكان الإقامة معلومات مكان الإقامة بشكل غير صحيح أو مضلل على الإكسترانت، أو </p>

                    <p>(iii) إخفاق مكان الإقامة في إدارة المعلومات على الإكسترانت، مما يؤدي إلى إفراط في قبول الحجوزات
                        في مكان الإقامة، أو </p>

                    <p>(iv) إخفاق مكان الإقامة في قبول حجز بالسعر المعروض على حجز، أو </p>

                    <p>(v) تحصيل مكان الإقامة ثمنًا باهظًا من نزيل واحد أو أكثر، أو </p>

                    <p>(vi) خصم مكان الإقامة من بطاقة ائتمان النزيل قبل وصول النزيل بدون أي موافقة صريحة من النزيل (حيث
                        يقدم النزيل موافقة صريحة إذا اختار نوع غرفة لا تُرد قيمتها أو تُشترى مقدمًا)، أو </p>

                    <p>(vii) تلقي Booking.com شكوى قانونية أو خطيرة واحدة أو أكثر من نزيل واحد أو أكثر أجرى حجوزات بمكان
                        الإقامة، أو</p>

                    <p>(viii) إساءة استخدام معالجة آراء النزلاء بأي سلوك يؤدي إلى ظهور رأي على مواقع الويب لا يعبر
                        بأمانه عن إقامة فعلية لنزيل فعلي بمكان الإقامة، أو </p>

                    <p>(ix) إبداء سلوك غير لائق أو غير مهني تجاه النزلاء أو موظفي Booking.com، أو</p>

                    <p>(x) أية قضايا أو مشكلات متعلقة بالسلامة أو بالخصوصية و بالصحة فيما يتعلق بمكان الإقامة أو المرافق
                        الخاصة به (يتحمل مكان الإقامة وعلى نفقته الخاصة وبناء على طلب من Booking.com إرسال التصاريح
                        والتراخيص والشهادات أو بيان صادر عن خبير مستقل ليثبت وليدعم الامتثال إلى القوانين والتشريعات
                        المطبقة حول (الخصوصية والسلامة والصحة). </p>

                    <p>7.5 عند الإنهاء وباستثناء ما هو منصوص عليه بخلاف ذلك، تنتهي هذه الاتفاقية تماماً وبأكملها في ما
                        يخص الطرف القائم بالإنهاء ويتوقف سريان مفعولها دون الإخلال بحقوق وتعويضات الطرف الآخر في ما يخص
                        أي تعويض أو انتهاك من جانب الطرف الآخر (القائم بالإنهاء) بهذه الاتفاقية. تظل الفقرات 6 و8 و9 و10
                        سارية المفعول بعد الإنهاء.</p>


                    <h4>8. الدفاتر والسجلات</h4>

                    <p>8.1 تُعد أنظمة Booking.com ودفاترها وسجلاتها (بما في ذلك الإكسترانت، و/أو بيان حجوزات الإنترنت
                        و/أو الفاكسات و/أو رسائل البريد الإلكتروني) دليلاً دامغًا على وجود - وتلقي مكان الإقامة لـ -
                        الحجوزات التي أجراها النزيل ومبلغ العمولة المستحق لشركة Booking.com على مكان الإقامة بموجب هذه
                        الاتفاقية، ما لم يستطيع مكان الإقامة تقديم دليل مضاد معقول وموثوق به.</p>

                    <p>8.2 يجب على مكان الإقامة بناء على طلب من Booking.com التعاون بشكل تام ومساعدة Booking.com بشأن
                        (والإفصاح عن جميع المعلومات المطلوبة بشكل معقول فيما يتعلق بـ) هوية المالك و/أو المدير و/أو
                        المتحكم بمكان الإقامة (الأساسي).</p>


                    <h4>9. السرية</h4>

                    <p>9.1 يدرك الطرفان ويوافقان على أنه بتنفيذ هذه الاتفاقية، يجوز لكل طرف الوصول إلى المعلومات السرية
                        للطرف الآخر والاطلاع عليها شكل مباشر أو غير مباشر ("<strong>المعلومات السرية</strong>"). تتضمن
                        المعلومات السرية بيانات العميل وحجم التعاملات وخطط التسويق والمشاريع والمعلومات التجارية
                        والمالية والفنية والتشغيلية وغيرها من المعلومات غير المتاحة للجمهور التي يُظهر الطرف الكاشف
                        بوضوح أنها معلومات خاصة أو سرية، أو التي ينبغي للطرف المتلقي العلم بشكل معقول أنه يجب التعامل
                        معها كمعلومات خاصة أو سرية. </p>

                    <p>9.2 يوافق كل طرف على ما يلي: (أ) تظل جميع المعلومات السرية ملكية حصرية للطرف الكاشف، ولا يستخدم
                        الطرف المتلقي أي من المعلومات السرية لأي غرض غير تعزيز هذه الاتفاقية، و(ب) أن يحافظ على
                        المعلومات السرية ويستخدم وسائل متبصرة لحمل موظفيه ومسؤوليه وممثليه وأطرافه ووكلائه
                        المتعاقدين("<strong>الأشخاص المصرح لهم</strong>")على الحفاظ على سرية وتكتم المعلومات السرية،
                        و(ج) ألا يكشف عن المعلومات السرية إلا للأشخاص المصرح لهم الذين بحاجة إلى الاطلاع على مثل هذه
                        المعلومات تعزيزًا لهذه الاتفاقية، و(د) ألا يقدم على - ويستخدم الوسائل المتبصرة لضمان عدم إقدام
                        الأشخاص المصرح لهم على - نسخ المعلومات السرية أو نشرها أو كشفها للآخرين أو استخدامها (خارج إطار
                        أحكام هذه الوثيقة)، و(هـ) أن يعيد أو يدمر كل (النسخ الورقية والبرمجية من) المعلومات السرية بناءً
                        على طلب خطي من الطرف الآخر. </p>

                    <p>9.3 بغض النظر عما سبق، (أ) لا تتضمن المعلومات السرية أي معلومات إلى المدى الذي (1) تكون أو تصبح
                        جزءا من الأملاك العامة من دون أي فعل أو تقصير من جانب الطرف المتلقي، أو (2) كانت في حوزة الطرف
                        المتلقي قبل تاريخ هذا العقد، (3) تم كشفها إلى الطرف المتلقي من قِبل طرف ثالث ليس عليه التزام
                        تجاه السرية في ما يتعلق بها، أو (4) يجب الكشف عنها وفقًا لقانون أو أمر محكمة أو أمر قضائي أو
                        سلطة حكومية و (ب) لا يوجد في هذا الاتفاق ما يمنع أو يحد أو يقيد أي طرف من الكشف عن الاتفاق (بما
                        في ذلك أي بيانات تقنية وتشغيلية ومالية (باستثناء بيانات العملاء)) إلى شركة تابعة تحت تحكم أو
                        تتحكم في الطرف ذي الصلة (تعتبر الشركة أو أي كيان آخر متحكمة في أخرى إذا امتلكت أو سيطرت على
                        خمسون بالمائة (50%) من أسهم التصويت أو غير ذلك من ملكية الشركة أو الكيان).</p>

                    <p>9.4 يبذل الطرفان جهودًا معقولة تجاريًا للحفاظ على سرية بيانات العميل وخصوصيتها وحمايتها من
                        الاستخدام أو الإفصاح غير المصرح بهما. ويوافق الطرفان على الامتثال للتوجيهين 95/46/EC و2002/58/EC
                        عند معالجة البيانات الشخصية وحماية الخصوصية.</p>


                    <h4>10. أحكام متنوعة</h4>

                    <p>10.1 لا يحق لأي طرف التنازل عن أي من حقوقه و/أو التزاماته بموجب هذه الاتفاقية أو نقلها أو فرض
                        أعباء عليها دون موافقة خطية مسبقة من الطرف الآخر، بشرط أنه يجوز لشركة Booking.com التنازل عن أي
                        من حقوقها و/أو التزاماتها بموجب هذه الاتفاقية أو نقلها أو فرض أعباء عليها (كليًا أو جزئيًا أو من
                        وقت لآخر) إلى شركة تابعة بدون موافقة خطية مسبقة من مكان الإقامة. أي تنازل أو نقل من قبل مكان
                        الإقامة لا يعفي المتنازل من التزاماته بموجب الاتفاقية.</p>

                    <p>10.2 يجب أن تكون كل الإخطارات والمراسلات خطية وباللغة الإنجليزية وتُرسل بالفاكسميل أو بخدمة
                        البريد الجوي المستعجل المعتمدة محليًا إلى رقم الفاكسميل أو العنوان المناسب المنصوص عليه في هذه
                        الاتفاقية. </p>

                    <p>10.3 تشكّل هذه الاتفاقية (بما فيها الجداول والملاحق والمرفقات، التي تمثل جزءًا لا يتجزء من هذه
                        الاتفاقية) اتفاقًا وتفاهمًا كاملين من الطرفين في ما يخص موضوعها وتحل محل وتلغي جميع الاتفاقيات،
                        أو الاتفاقات، أو العروض ((غير) الملزمة)، أو التعهدات، أو البيانات الخاصة بمثل هذا الموضوع (بما
                        في ذلك المقابل بالنسبة لمكان الإقامة). </p>

                    <p>10.4 إذا كان أي من نصوص هذه الاتفاقية غير سارٍ أو غير ملزم أو إذا أصبح كذلك، يظل الطرفان ملتزمين
                        بجميع نصوصها الأخرى. وفي هذه الحالة، يضع الطرفان محل النص غير الساري أو غير الملزم نصوصًا سارية
                        أو ملزمة ويكون لهذه النصوص - إلى أقصى حد ممكن - نفس تأثير النص غير الساري أو غير الملزم، مع
                        مراعاة محتويات هذه الاتفاقية وغرضها.</p>

                    <p>10.5 باستثناء ما هو منصوص عليه خلافًا لذلك في هذه الاتفاقية، تخضع هذه الاتفاقية وتفسر حصرياً
                        وفقاً لقوانين هولندا. وباستثناء ما هو منصوص عليه خلافًا لذلك في هذه الاتفاقية، تُرفع أي نزاعات
                        ناشئة من هذه الاتفاقية أو في ما يتعلق بها ويتم التعامل معها حصريًا إلى المحكمة المختصة في
                        أمستردام بهولندا.</p>

                    <p>10.6 يوافق الطرفان ويقران أنه بغض النظر عن هذه الفقرة 10-5، لا يوجد أي شيء في هذه الاتفاقية يمنع
                        أو يحد من حق Booking.com في رفع أو تقديم أي دعوى أو اتخاذ إجراء قانوني أو المطالبة بتعويض قضائي
                        أو وفاء (مطابق) مؤقت أمام أو في أي محاكم مختصة حيثما يكون مكان الإقامة مؤسسًا أو مسجلاً بموجب
                        قوانين الولاية القضائية ذات الصلة التي يكون مكان الإقامة مؤسسًا أو مسجلاً فيها، ولهذا الغرض،
                        يتنازل مكان الإقامة عن حقه في المطالبة بأي ولاية قضائية أخرى أو أي قانون سارٍ آخر قد يكون له حق
                        بموجبه.</p>

                    <p>10.7 يجوز ترجمة النسخة الإنجليزية الأصلية من هذه الأحكام إلى لغات أخرى. والنسخة المترجمة من
                        الأحكام الإنجليزية ليست سوى نوع من التيسير ولا تتعدى كونها ترجمة مكتبية، ولا يجوز لمكان الإقامة
                        أن يستمد أي حقوق من النسخة المترجمة. وفي حالة أي خلاف بخصوص محتوى أو ترجمة شروط وأحكام هذه
                        الاتفاقية أو في حالة وجود مشكلة أو غموض أو تناقض أو تعارض بين النسخة الإنجليزية ونسخة اللغات
                        الأخرى من هذه الأحكام، يكون التطبيق والإلزام والغلبة والقرار النهائي للنسخة المحررة باللغة
                        الإنجليزية. يتعين استخدام النسخة الانجليزية في الإجراءات القانونية. وتتوفر النسخة الانجليزية على
                        الموقع التالي <a
                                href="https://admin.booking.com/hotelreg/terms-and-conditions.html?cc1=eg&amp;lang=en">https://admin.booking.com/hotelreg/terms-and-conditions.html?cc1=eg&amp;lang=en</a>
                        وترسل إليك بناءً على طلب خطي.</p>

                    <p>10.8 فيما يتعلق بـ (أو كقرار لـ) التنفيذ، الإنجاز، الإغلاق، التسجيل، الحفظ في الملفات و/أو
                        التنفيذ، الأداء أو الإنجاز عملاً حسب أو بالاتفاقية، على مكان الإقامة (شاملاً موظفيه، مديريه،
                        وكلائه وأي من مثليه الآخرين) (أولاً) عدم القيام بشكل مباشر أو غير مباشر (أ) بعرض، وعد أو القيام
                        بإعطاء أي طرف ثالث (شاملاً المسئولين الحكوميين، أو (ممثلي ومرشحي) الأحزاب السياسية)، أو (ب)
                        السعي، الموافقة على أو الحصول على وعد لنفسه من أي طرف ثالث، و/أو أي هدية، دفعة، جائزة، منفعة من
                        أي شكل يمكن تفسيرها كرشوة أو فساد إداري أو تصرف غير قانوني و (ثانياً) الامتثال بكافة القوانين
                        المطبقة التي تنظم عدم الرشوة وهدايا وممارسات الفساد (بما يشمل قانون ممارسات الفساد في الولايات
                        المتحدة وقانون عدم الرشوة في المملكة المتحدة).</p>

                    <p>10.9 تدخل الاتفاقية حيز النفاذ عبر الإنترنت أو عن طريق تنفيذ نظير منفصل أو عن طريق PDF أو نسخة
                        فاكس، وتعتبر كل (نسخة) منها أصلية وسارية المفعول وملزمة. تدخل الاتفاقية حيز النفاذ وتكون سارية
                        المفعول بناء على تأكيد كتابي بالقبول الموافقة على مكان الإقامة من قبل Booking.com. عن طريق
                        التسجيل والاشتراك في برنامج شركاء Booking.com كمكان إقامة شريك، يوافق ويقر ويقبل مكان الإقامة
                        شروط وأحكام هذه الاتفاقية. لا تحتاج الاتفاقية حبرية أو حجرية لتكون فعالة وملزمة وقابلة
                        للتنفيذ.</p>

                    <p>10.10 نظرًا للقوانين والتشريعات المطبقة لمكافحة غسيل الأموال والفساد وتمويل الإرهابيين والتهرب
                        الضريبي، فإنه يحظر على Booking.com من توفير أية خدمة إلى وقبول أية دفعات من أو عمل أو تنفيذ أو
                        تسهيل الدفعات لحساب بنكي ("<strong>حساب بنكي</strong>") لا يمت بصلة للسلطة القضائية التي يقع
                        فيها مكان الإقامة و(لكن على أي حال) أو لطالما كانت أي من الضمانات التالية غير صحيحة. بموجبه
                        يتعهد ويضمن مكان الإقامة (على الرغم من القوانين القضائية للحساب البنكي):</p>

                    <p>(i) بأنه يحمل ويتماشى مع جميع التصاريح والتراخيص الحكومية الأخرى والتفويضات اللازمة لإجراء وتنفيذ
                        ومتابعة عملياتها وأعمالها (بما في ذلك الحصول على واستخدام الحساب البنكي).</p>

                    <p>(ii) بأنه من يملك الحساب البنكي</p>

                    <p>(iii) بأن الدفعة والتحويل من/ إلى الحساب البنكي هو بيع على أساس تجاري صرف، ووفقًا لكل القوانين
                        والتشريعات والقوانين واللوائح والمراسيم والقواعد ولا تنتهك أية قوانين مطبقة لمكافحة غسيل الأموال
                        أو الفساد أو تمويل الإرهاب أو مكافحة التهرب الضريبي من قانون أو معاهدة أو لائحة أو قانون أو
                        تشريع (الضريبة) و</p>

                    <p>(iv) بأن الحساب البنكي لا يستخدم بشكل (مباشر أو غير مباشر) لغسيل الأموال أو تمويل الإرهابيين أو
                        التهرب الضريبي أو تجنب الضرائب أو أية أنشطة غير قانونية أخرى</p>

                    <p>يوافق مكان الإقامة بموجب هذا على تعويض Booking.com بشكل كامل عن جميع الأضرار والخسائر والمطالبات
                        والخسائر والعقوبات والخسائر والغرامات والتكاليف والنفقات التي تحملتها أو دفعتها أو التي تكبدتها
                        Booking.com B.V. (أو أي من مجموعة الشركات التابعة لها (بالإضافة لأي من مدرائه / مدرائها أو
                        مسؤوليها أو موظفيها أو عملائها أو ممثليها)) لأي مطالبة (مزعومة أو تم التوعد بها) من قبل الحكومة
                        أو السلطة أو المنظمة أو الجهة الشريكة أو الشخص الذي يتلقى الدفعة من خلال أو من الحساب البنكي غير
                        القانوني أو ينتهك أية قوانين أو لوائح أو تشريعات أو قواعد مطبقة (لمكافحة الفساد / مكافحة غسيل
                        الأموال / التهرب الضريبي / مكافحة تمويل الإرهابيين).</p>


                </div>


            </div>

            <div class="modal-footer text-center">

                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">اغلاق</button>

            </div>

        </div>

    </div>

</div>

<div class="container" style="padding:50px 50px; display:none;">

    <div class="row well alert alert-success"><?php echo "<pre>";print_R($_POST);?></div>


    {!! Form::close() !!}


</div>

<div class="preloader" style="display:none;">

    <div class="cssload-speeding-wheel"></div>

</div>

</body>


</html>


<script src="{{asset('js/dropzone.js')}}"></script>


@include('auth._dropZoneInitScript')


<script type="text/javascript">
    function show(theid) {
        console.log('show ' + theid);
        if(document.getElementById(theid).style.display=='none') {
            document.getElementById(theid).style.display='block';
        }
        return false;
    }
    function hide(theid) {
        console.log('hide ' + theid);
        if(document.getElementById(theid).style.display=='block') {
            document.getElementById(theid).style.display='none';
        }
        return false;
    }

    $(document).ready(function () {

        var current = 1, current_step, next_step, steps;
        steps = $("fieldset").length;

        // add places when the numbers change
        $('#numbers').on('change blur', function () {
            var placesToAdd = Number($(this).val());

            $('#addedNewItems').html('');
            while (placesToAdd > 1) {
                $('#addItem').trigger('click');
                placesToAdd--;
            }
        });

        $(".next").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().next();

            validateStep(current, function () {
                next_step.show();
                current_step.hide();
                setProgressBar(current++);
                $('body').animate({scrollTop: 0}, 'fast');
            });
        });

        $(".previous").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(current--);
        });

        $(".prevstep").click(function () {
            current_step = $(this).next();
            next_step = $(this).next().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                    .css("width", percent + "%")
                    .html(percent + "%");
        }

        function validateStep(step, successCallBack) {
            var data = {};
            //clear any validation error message
            $('.step-' + step + '-errorMessages').html(' ');

            $('.step-' + step).each(function () {
                data[$(this).attr('name')] = $(this).val();
            });

            // console.log('{{route('validate.step')}} ' + " test");
            // return false;
            $.ajax({
                'url': '{{route('validate.step')}}',
                'method': 'POST',
                'data': {'step': step, '_token': $('input[name=_token]').val(), data: data},
                success: function (response) {
                    if (typeof response.errors == 'undefined') {
                        successCallBack();
                        return true;
                    }
                    //example of response error
                    // {email : [error messages] , mobile : [error messages]}
                    response = response.errors;

                    for (var fieldName in response) {
                        for (var message in response[fieldName]) {
                            var html = '<div class="alert alert-danger" role="alert">' + response[fieldName][message] + '</div>'
                            $('.step-' + step + '-errorMessages').append(html);
                        }
                    }
                }
            });
        }
    });
</script>

<script>
    // Accepts an element and a function
    function childRecursive(element, func) {
        // Applies that function to the given element.
        func(element);
        var children = element.children();
        if (children.length > 0) {
            children.each(function () {
                // Applies that function to all children recursively
                childRecursive($(this), func);
            });
        }
    }

    // Expects format to be xxx-#[-xxxx] (e.g. item-1 or item-1-name)
    function getNewAttr(str, newNum) {
        // Split on -
        var arr = str.split('-');
        // Change the 1 to wherever the incremented value is in your id
        arr[1] = newNum;
        // Smash it back together and return
        return arr.join('-');
    }
    // Written with Twitter Bootstrap form field structure in mind

    // Checks for id, name, and for attributes.
    function setCloneAttr(element, value) {
        // Check to see if the element has an id attribute
        if (element.attr('id') !== undefined) {
            // If so, increment it
            element.attr('id', getNewAttr(element.attr('id'), value));
        } else { /*If for some reason you want to handle an else, here you go */
        }
        // Do the same with name...
        if (element.attr('name') !== undefined) {
            var newName = element.attr('name').replace('places[0]', 'places[' + value + ']');

            element.attr('name', newName);
        } else {
        }

        // And don't forget to show some love to your labels.
        if (element.attr('for') !== undefined) {
            element.attr('for', getNewAttr(element.attr('for'), value));
        } else {
        }
    }

    // Sets an element's value to ''
    function clearCloneValues(element) {
        if (element.attr('value') !== undefined) {
            element.val('');
        }
    }

    //$(document).ready(function(){

    $('#addItem').click(function () {
        //increment the value of our counter
        $('#itemCounter').val(Number($('#itemCounter').val()) + 1);

        var counter = $('#itemCounter').val();
        var str = '';

        // Append dropzone for places images
        for(var i = 1; i <= counter; i++) {

            str += '<strong>بند ' + i + '</strong><br /> <div class="upload-drop-zone" id="drop-zone-' + i + '">Just drag and drop files here </div><div class="js-upload-finished"> <div class="list-group imageUploads-' + i + '"> </div> </div>';
        }
        $('.upload_pics').html(str);
        dropZone_trigger();
        //clone the first .item element
        var newItem = $('div.item').first().clone();

        //clear all new Item values
        newItem.find('input[type=text],textarea,input[type=number]').val('');
        newItem.find('input[type=checkbox]').attr('checked', false);
        newItem.find('.bed').not(':first').remove();

        //recursively set our id, name, and for attributes properly
        childRecursive(newItem,
                // Remember, the recursive function expects to be able to pass in
                // one parameter, the element.
                function (e) {
                    setCloneAttr(e, counter);
                });

        newItem.find('.addBed').click({counter: counter}, addBed);

        //add listener when change لايوجد - يوجد
        newItem.find('#sleep_room-' + counter).on('change', {template: newItem, counter: counter}, hideOrShowBedType);

        //show the bed types after any newly item added
        newItem.find('#bedType-' + counter).show();

        //add listener on the newly added amenity
        newItem.find('#extraAmenity-' + counter).find("button[type=button]").attr('data-target', '#collapseExample-' + counter);

        newItem.find('#removeItem-' + counter).show().on('click', function () {
            newItem.remove();
        });

        // Clear the values recursively
        // Finally, add the new div.item to the end
        $('#addedNewItems').append(newItem);
    });

    $('.addBed').click({counter: 0}, addBed);

    $('#sleep_room').on('change', {template: $('html'), counter: null}, hideOrShowBedType);

    function addBed(event) {
        //increment the value of our counter
        $('.BedCounter').val(Number($('.BedCounter').val()) + 1);
        //clone the first .item element
        var newItem = $('div.bed').first().clone();
        var newName = newItem.find('#type_bed').attr('name').replace('places[0]', 'places[' + event.data.counter + ']');
        newItem.find('#type_bed').attr('name', newName);

        // Finally, add the new div.item to the end
        newItem.appendTo($(this).parent().find('.Beds'));
    }

    /**
     * hide or show the bed types
     * @param event
     */

    function hideOrShowBedType(event) {
        var counter = event.data.counter;
        var selector = '#bedType';

        if (counter != null) {
            selector += '-' + counter;
        }

        if ($(this).val() == 'no') {
            event.data.template.find(selector).hide();
        }
        else {
            event.data.template.find(selector).show();
        }
    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBlyBXmZZzjc_pt3q28P9g8neup3gAccAE"></script>
<script src="{{ asset('js/jquery.geocomplete.js') }}"></script>

@include('geocompleteInitScript',['geoLat' => 24.706915 , 'geoLng' => 46.675415])
