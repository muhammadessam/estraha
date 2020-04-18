<!--.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.ownerscontrol')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
             <div class="col-sm-6 ol-md-6 col-xs-12">


                <div class="white-box">


                        <div class="form-group">
                            <label for="userName">{{Lang::get('esteraha.username')}}</label>
                            
                                {!! Form::text('userName', $owners->name,['class'=> 'form-control'  , 'required'=>'required'])!!}
                          
                        </div>

                        <div class="form-group">
                            <label for="email">{{Lang::get('esteraha.email')}}</label>
                            
                                {!! Form::email('email', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                           
                        </div>

                       <div class="form-group">
                           <label for="phone_number">{{Lang::get('esteraha.phoneNumber')}}</label>
                          
                               {!! Form::text('phone_number', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                           
                        </div>

                    @if(Request::path() == 'owners/create')
                     <div class="form-group">
                        <div class="example">
                            <label for="birth_date">{{Lang::get('esteraha.birthdate')}}</label>
                             {!! Form::text('birth_date', null,['class'=> 'form-control mydatepicker'  , 'required'=>'required'])!!}
                        </div>
                     </div>
                    @else
                     <div class="form-group">
                        <div class="example">
                            <label for="birth_date">{{Lang::get('esteraha.birthdate')}}</label>
                              {!! Form::text('birth_date', $date,['class'=> 'form-control mydatepicker'  , 'required'=>'required'])!!}
                        </div>
                     </div>
                    @endif

                    <div class="form-group">
                        <label>{{Lang::get('esteraha.gender')}}</label>

                            <select class="form-control" name="gender">
                                <option value="m" @if($owners->gender == 'm') selected @endif>{{Lang::get('esteraha.m')}}</option>
                                <option value="f" @if($owners->gender == 'f') selected @endif>{{Lang::get('esteraha.f')}}</option>
                            </select>

                    </div>


                    @if(Request::path() == 'owners/create')


                        <div class="form-group">
                            <label for="password">{{Lang::get('esteraha.password')}}</label>
                            
                                {!! Form::password('password',['class'=> 'form-control' , 'required'=>'required'])!!}
                         
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">{{Lang::get('esteraha.confirmpassword')}}</label>
                            
                                {!! Form::password('password_confirm',['class'=> 'form-control'  , 'required'=>'required'])!!}
                            
                        </div>

                     @endif

                    <div class="map_canvas" style=" height: 300px; width:100%;"></div>

                </div>
				</div>

              <div class="col-sm-6 ol-md-6 col-xs-12">

                <div class="white-box">

                    <div class="form-group">
                        <label for="site">{{Lang::get('esteraha.webaddress')}}</label>
                            {!! Form::text('site',$supplier != null ? $supplier->web_address : null,['class'=> 'form-control'])!!}
                    </div>

                    <div class="form-group">
                        <label for="geoaddress" class="col-sm-3 req">العنوان</label>
                            <input type="hidden" id="geocomplete">
                            <input   type="text" placeholder="العنوان" class="form-control step-1" value="{{old('geoaddress',$supplier != null ? $supplier->address : null)}}" name="geoaddress" required />
                            <input name="lat" type="hidden" value="{{old('lat',$supplier != null ? $supplier->lat : null)}}">
                            <input name="lng" type="hidden" value="{{old('lng',$supplier != null ? $supplier->lng : null)}}">

                    </div>

                    <div class="form-group">
                        <label for="formatted_address" class="col-sm-3">تفصيل العنوان</label>

                            <input name="formatted_address" class="form-control" type="text" value="{{old('formatted_address',$supplier != null ? $supplier->address_details : null)}}">

                    </div>

                    <div class="form-group">
                        <label for="route" class="col-sm-3">الشارع</label>

                            <input name="route" class="form-control" type="text" value="{{old('route',$supplier != null ? $supplier->street : null)}}">

                    </div>

                    <div class="form-group">
                        <label for="street_number" class="col-sm-3">رقم الشارع</label>

                            <input name="street_number" class="form-control" type="text" value="{{old('street_number',$supplier != null ? $supplier->street_number : null)}}">

                    </div>

                    <div class="form-group">
                        <label for="postal_code" class="col-sm-3">الكود البريدي</label>

                            <input name="postal_code" class="form-control" type="text" value="{{old('postal_code',$supplier != null ? $supplier->code : null)}}">

                    </div>

                    <div class="form-group">
                        <label for="country" class="col-sm-3">الدولة</label>

                            <input name="country" class="form-control" type="text" value="{{old('country',$supplier != null ? $supplier->country : null)}}">

                    </div>


                    <div class="form-group">
                        <label for="administrative_area_level_1" class="col-sm-3">المحافظة او الولاية</label>

                            <input name="administrative_area_level_1" class="form-control" type="text" value="{{old('administrative_area_level_1',$supplier != null ? $supplier->state : null)}}">

                    </div>
                       <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>
                       <a href="{{url()->previous()}}" class="btn btn-inverse waves-effect waves-light" style="color: white">{{Lang::get('esteraha.cancel')}}</a>
                </div>


            </div>
        </div>
    </div>
</div>
      </div>
    </div>


@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBlyBXmZZzjc_pt3q28P9g8neup3gAccAE"></script>
    <script src="/js/jquery.geocomplete.js"></script>
    <?php
    $geoLat = $supplier != null ? $supplier->lat :24.706915;
    $geoLng = $supplier != null ? $supplier->lng :46.675415;
    ?>
    @include('geocompleteInitScript',['geoLat' => $geoLat , 'geoLng' => $geoLng ])

    @endsection