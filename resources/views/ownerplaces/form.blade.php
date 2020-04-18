<!--.row-->
<script>
    function specialoffer() {
        if (document.getElementById("specialoffer").checked) {
            document.getElementById("priceoffer").style.display = "block";
        } else {
            document.getElementById("priceoffer").style.display = "none";
        }
    }
</script>
<link rel="stylesheet" type="text/css" href="/styles.css" />


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">{{Lang::get('esteraha.addplace')}}</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">


    <div class="col-sm-6 ol-md-6 col-xs-12">
        <div class="white-box">

            <div class="form-group">
                <label for="name">{{Lang::get('esteraha.placename')}}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                    {!! Form::text('place_name', null,['class'=> 'form-control'  , 'required'=>'required','id'=>'place_name'])!!}
                </div>
            </div>

            <div class="form-group">
                <label for="rooms">{{Lang::get('esteraha.rooms')}}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-layers-alt"></i></div>
                    {!! Form::text('rooms', null,['class'=> 'form-control' , 'required'=>'required','id'=>'rooms'])!!}
                </div>
            </div>



            <div class="row">
                @if(Request::path() == 'ownerplaces/create')

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.segment')}}</label>
                            <div class="input-group">
                                <select class="form-control" name="gender" id="gender">
                                    <option value="m">{{Lang::get('esteraha.male')}}</option>
                                    <option value="f">{{Lang::get('esteraha.female')}}</option>
                                    <option value="b">{{Lang::get('esteraha.both')}}</option>

                                </select>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.segment')}}</label>
                            <div class="input-group">
                                <select class="form-control" name="gender" id="gender">
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
                        </div>
                    </div>
                @endif


                @if(Request::path() == 'ownerplaces/create')
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.type')}}</label>
                            <div class="input-group">
                                <select class="form-control" name="type_id" id="type_id">
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{Lang::get('esteraha.type')}}</label>
                            <div class="input-group">
                                <select class="form-control" name="type_id" id="type_id">
                                    <option value="{{$places->type_id}}">{{$tname}}</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif

            </div>


            <div class="row">
                <div class="col-md-3">
                    <input id="geocomplete"
                           class="form-control"
                           name="address" type="text" placeholder="Type in an address" value="Saudi Arabia" />
                </div>
                <div class="col-md-2">
                    <input id="find" type="button" value="ابحث" />
                </div>
            </div>
            <div class="map_canvas"></div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>{{Lang::get('esteraha.latitude')}}</label>
                        {!! Form::text('lat', null,['class'=> 'form-control'  , 'required'=>'required','id'=>'lat'])!!}
                    </div>
                    <div class="col-md-6">
                        <label>{{Lang::get('esteraha.longitude')}}</label>
                        {!! Form::text('lng', null,['class'=> 'form-control'  , 'required'=>'required','id'=>'lng'])!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 ol-md-6 col-xs-12">
        <div class="white-box">
            <div class="form-group">
                <label for="price">{{Lang::get('esteraha.price')}}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-money"></i></div>
                    {!! Form::text('price', null,['class'=> 'form-control' , 'required'=>'required','id'=>'price'])!!}
                </div>
            </div>

            <div class="form-group">
                <label for="description">{{Lang::get('esteraha.description')}}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-notepad"></i></div>
                    {!! Form::textarea('description', null,['class'=> 'form-control'  , 'required'=>'required','id'=>'description'])!!}
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox checkbox-primary pull-left p-t-0">
                    <input id="specialoffer" type="checkbox" name="special_offer" onclick='specialoffer()'>
                    <label for="special_offer">{{Lang::get('esteraha.specialoffers')}}</label>
                </div>
            </div>
            <div class="form-group" style="display:none;" id="priceoffer">
                <label for="price_offer">{{Lang::get('esteraha.priceoffer')}}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="ti-money"></i></div>
                    {!! Form::text('price_offer', null,['class'=> 'form-control','id'=>'price_offer'])!!}
                </div>
            </div>

                <div class="form-group">
                    <label>{{Lang::get('esteraha.amenities')}}</label>
                    <div class="input-group">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            @foreach ($amenities as $amenity)
                                <input id="{{$amenity->id}}" type="checkbox" name="amenity_id[]" value="{{$amenity->id}}">
                                <label for="{{$amenity->id}}">{{$amenity->name}}</label>
                            @endforeach

                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <label class="box-title m-b-0">{{Lang::get('esteraha.uploadpicture')}} </label>
                        <div id="my-awesome-dropzone" class="dropzone" >
                            <div class="fallback">
                                {!! Form::file('picture[]', null, ['class'=> 'form-control','files'=>true,'multiple'=>'multiple','id'=>'picture']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <div class="white-box">
                        <button type="submit" id="submit-form" class="btn btn-success waves-effect waves-light m-r-10"  > {{Lang::get('esteraha.submit')}} <i class="fa fa-check"></i></button>
                    </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDy3BphIhjTBffDKhLMG3MBiWep7jZfIfs"></script>
    <script src="/jquery.geocomplete.js"></script>
    <script>
        $(function(){
            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form ",
                markerOptions: {
                    draggable: true
                }
            });

            $("#geocomplete").bind("geocode:dragged", function(event, latLng){
                $("input[name=lat]").val(latLng.lat());
                $("input[name=lng]").val(latLng.lng());
                $("#reset").show();
            });

            $("#reset").click(function(){
                $("#geocomplete").geocomplete("resetMarker");
                $("#reset").hide();
                return false;
            });

            $("#find").click(function(){
                $("#geocomplete").trigger("geocode");
            }).click();
        });
    </script>


   <script>
        Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

            // The configuration we've talked about above
            autoProcessQueue: false,
            addRemoveLinks: true,
            url: "/ownerplaces",
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,

            // The setting up of the dropzone
            init: function() {
              //  var myDropzone = this;

                var myDropzone = this;

                var el = document.getElementById('submit-form');
                if(el){
                    el.addEventListener("click", function(e) {
                        // Make sure that the form isn't actually being sent.
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                }

                this.on("sending", function(file, xhr, formData) {
                    // Will send the filesize along with the file as POST data.
                    formData.append('name', jQuery('#name').val());
                    $("form").find("input").each(function(){
                        formData.append($(this).attr("name"), $(this).val());
                    });

                    $("form").find("select").each(function(){
                        formData.append($(this).attr("name"), $(this).val());
                    });

                    $("form").find("checkbox").each(function(){
                        formData.append($(this).attr("name"), $(this).val());
                    });

                    $("form").find("textarea").each(function(){
                        formData.append($(this).attr("name"), $(this).val());
                    });
                });

                // First change the button to actually tell Dropzone to process the queue.
                /*this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });*/

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
//                this.on("sendingmultiple", function(){
//
//                    var myForm = document.querySelector('#my-awesome-dropzone');
//                    formData = new FormData(myForm);
//
//                    formData.append('name', jQuery('#name').val());
//
//                    $("#my-awesome-dropzone").find("input").each(function(){
//                        formData.append($(this).attr("name"), $(this).val());
//                    });
//                   // alert("hello");
//                    // Gets triggered when the form is actually being sent.
//                    // Hide the success button or the complete form.
//                });
                this.on("successmultiple", function(files, response) {
                    alert("helloone");
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                });
                this.on("errormultiple", function(files, response) {
                  //  alert("hellotwo");
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });
            }

        }
    </script>

  <!--  <script>
        Dropzone.options.myAwesomeDropzone = {
            url: "/ownerplaces",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: "image/*",

            init: function () {

//                var submitButton = document.querySelector("#submit-form");
//                var wrapperThis = this;
//
//                submitButton.addEventListener("click", function () {
//                    wrapperThis.processQueue();
//                });

                var myDropzone = this;

                var el = document.getElementById('submit-form');
                if(el){
                    el.addEventListener("click", function(e) {
                        // Make sure that the form isn't actually being sent.
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                }


                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    formData.append("place_name", $("#place_name").val());
                    formData.append("rooms", $("#rooms").val());
                    formData.append("description", $("#description").val());
                    formData.append("gender", $("#gender").val());
                    formData.append("guests", $("#guests").val());
                    formData.append("price", $("#price").val());
                    formData.append("lat", $("#lat").val());
                    formData.append("lng", $("#lng").val());
                    formData.append("type_id", $("#type_id").val());
                    formData.append("amenity_id[]", $("#amenity_id").val());
                    formData.append("price_offer", $("#price_offer").val());
                    formData.append("special_offer", $("#special_offer").val());
                });
            }
        };
    </script>-->

@stop