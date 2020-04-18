<!--.row-->
<script>
    function specialoffer() {
        if (document.getElementById("special_offer").checked) {
            document.getElementById("price_offer").style.display = "block";
        } else {
            document.getElementById("price_offer").style.display = "none";
        }
    }
</script>
<link rel="stylesheet" type="text/css" href="/styles.css" />


<div class="row">
    <div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading"> إضافة مكان جديد</div>
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
    <div class="col-sm-6 ol-md-6 col-xs-12">


        <div class="white-box">

            <div class="form-group">
                <label for="name">{{Lang::get('esteraha.placename')}}</label>
              
                   
                    {!! Form::text('place_name', null,['class'=> 'form-control'  , 'required'=>'required','placeholder' =>Lang::get('esteraha.placename')])!!}
              
            </div>
			
			
			  
    <div class="form-group">
  <label for="checkin_start" class="col-sm-6">تسجيل الوصول</label>
    <select class="form-control" id="checkin_start" name="checkin_start">
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
	
			
			
			  
    <div class="form-group">
	  <label for="checkin_end" class="col-sm-6">تسجيل المغادرة</label>
    <select class="form-control" id="checkin_end" name="checkin_end">
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
			
			

		    
        <div class="form-group">
		 <label for="inner_room" class="col-sm-6">عدد الغرف الداخلية</label>
        <input type="number" class="form-control" name="inner_room" value="0">
        </div>
		

            <div class="form-group">
                <label for="description">{{Lang::get('esteraha.description')}}</label>
                <div class="input-group">
                   
                    {!! Form::textarea('description', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                </div>
            </div>

          
                <div class="form-group">
                    <input
                           class="form-control"
                           name="address" type="text" placeholder="Type in an address" value="Saudi Arabia" />
               
                    <input type="hidden" id="geocomplete">
             </div>
				<div class="form-group">
                <div class="map_canvas" style="margin: 0px 0px 0px 0px !important;width: 100%;"></div>
				</div>
           


            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>{{Lang::get('esteraha.latitude')}}</label>
                        {!! Form::text('lat', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                    </div>
                    <div class="col-md-6">
                        <label>{{Lang::get('esteraha.longitude')}}</label>
                        {!! Form::text('lng', null,['class'=> 'form-control'  , 'required'=>'required'])!!}
                    </div>
                </div>
            </div>

      

    </div>
</div>

    <div class="col-sm-6 ol-md-6 col-xs-12">
        <div class="white-box">
    
			
			     @if(Request::path() == 'places/create')
               
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.type')}}</label>
                        
                                <select class="form-control" name="type_id">
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            
                        </div>
                    
                @else
                   
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.type')}}</label>
                           
                                <select class="form-control" name="type_id">
                                    <option value="{{$places->type_id}}">{{$tname}}</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                           
                        </div>
                   
                @endif
			    
        <div class="form-group">
		  <label for="stars" class="col-sm-6">المكان ذو</label>
        <select class="form-control" id="stars" name="stars">
            <option value="5">خمس نجوم</option>
            <option value="4">اربع نجوم</option>
            <option value="3">ثلاث نجوم</option>
            <option value="2">اثنان نجوم</option>
            <option value="1">نجمة واحدة</option>
        </select>
        </div>
		
		     @if(Request::path() == 'places/create')

                   
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.segment')}}</label>
                        
                                <select class="form-control" name="gender">
                                    <option value="m">{{Lang::get('esteraha.male')}}</option>
                                    <option value="f">{{Lang::get('esteraha.female')}}</option>
                                    <option value="b">{{Lang::get('esteraha.both')}}</option>

                                </select>
                          
                        </div>
         
                @else
                   
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.segment')}}</label>
                         
                                <select class="form-control" name="gender">
                                    <option value="{{$places->gender}}">
                                        @if($places->gender == 'm')
                                            {{Lang::get('esteraha.male')}}

                                        @elseif($places->gender == 'f')
                                            {{Lang::get('esteraha.female')}}

                                        @elseif($places->gender == 'b')
                                            {{Lang::get('esteraha.both')}}
                                        @endif
                                    </option>
                                    <option value="m">{{Lang::get('esteraha.male')}}</option>
                                    <option value="f">{{Lang::get('esteraha.female')}}</option>
                                    <option value="b">{{Lang::get('esteraha.both')}}</option>

                                </select>
                          
                      
                    </div>
                @endif
				
		 <div class="form-group">
          <label for="sleep_room" class="col-sm-6">غرف نوم</label>
      <select class="form-control" id="sleep_room" name="sleep_room">
          <option value="yes">يوجد</option>
          <option value="no">لا يوجد</option>
      </select>
      </div>
		

	      <div id="bedType">
       
            <label for="type_bed" class="col-sm-6">نوع السرير</label>

        <div id="bedsTypes">
        <div id="cloneAddBed" class="form-group">
            <select class="form-control" id="type_bed" name="type_bed[]">
            <option value="two">مزدوج</option>
            <option value="one">فردي</option>
        </select>
        </div>
        </div>
        <div class="form-group">
        <input type="button" value="اضافة سرير" class="addBed btn btn-add">
        </div>
        </div>

 

        </div>
    </div>

<div class="col-md-12">


     @if(Request::path() == 'places/create')
                <div class="form-group">
                    <h3 class="box-title">المرافق</h3>
                    <hr class="m-t-0 m-b-20">
               
                        <div class="checkbox checkbox-primary p-t-0">
					
    
                            @foreach ($amenities as $amenity)
							<div class="col-md-3">
                                <input id="{{$amenity->id}}" type="checkbox" name="amenity_id[]" value="{{$amenity->id}}">
                                <label for="{{$amenity->id}}">{{$amenity->name}}</label>
								  </div>
                            @endforeach
                       
                        </div>
                 
                </div>
            @else
                <div class="form-group">
                    <label>{{Lang::get('esteraha.amenities')}}</label>
                 

                        <div class="checkbox checkbox-primary p-t-0">

                            <input id="{{$amenity->id}}" type="checkbox" name="amenity_id[]" value="{{$amenity->id}}">
                            <label for="{{$amenity->id}}">{{$amenity->name}}</label>
                            @foreach ($amenities as $amenity)
                                <input id="{{$amenity->id}}" type="checkbox" name="amenity_id[]" value="{{$amenity->id}}">
                                <label for="{{$amenity->id}}">{{$amenity->name}}</label>
                            @endforeach

                        </div>
                   
                </div>
            @endif


<div class="col-md-4">
       <div class="form-group">
                <label for="price">{{Lang::get('esteraha.price')}}</label>
                <div class="input-group">
                    <div class="input-group-addon">SAR/ الليلة</div>
                    {!! Form::text('price', null,['class'=> 'form-control' , 'required'=>'required'])!!}
                </div>
          </div>

</div>

    <div class="col-md-12">
        <label for="drop-zone" class="col-sm-6">صور مكان الاقامة</label>
    <div id="drop-zone" action="#" class="dropzone ">

    </div>
        <div class="step-4-errorMessages">

        </div>
       <br>
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" style="float: right;" > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>

    </div>



</div>
            </div>
    </div>
    </div></div></div>




@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDy3BphIhjTBffDKhLMG3MBiWep7jZfIfs"></script>
    <script src="/jquery.geocomplete.js"></script>
    @include('geocompleteInitScript',['geoLat' => 24.706915 , 'geoLng' => 46.675415])
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script>    Dropzone.autoDiscover = false; </script>
    <script>
        $(function(){

            $('select[name=sleep_room]').on('change',function(){
                if ($(this).val() == 'no')
                {
                    $('#bedType').hide();
                }
                else
                {
                    $('#bedType').show();
                }
            });

            $('.addBed').on('click',function(){
                var cloned = $('#cloneAddBed').clone();
                    $('#bedsTypes').append(cloned);
            });
        });
    </script>

    @include('place.dropZoneScript')
@stop